<?php

namespace App\Livewire\Pages\Investment;

use App\Livewire\Pages\Investment\Traits\Step1;
use App\Livewire\Pages\Investment\Traits\Step2;
use App\Livewire\Pages\Investment\Traits\Step3;
use App\Livewire\Pages\Investment\Traits\Step4;
use App\Livewire\Pages\Investment\Traits\Step5;
use App\Livewire\Pages\Investment\Traits\Step6;
use App\Livewire\Pages\Investment\Traits\Step7;
use App\Models\Investor;
use App\Models\InvestorContribution;
use App\Models\InvestorResource;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class InvestmentForm extends Component
{
    use Step1, Step2, Step3, Step4, Step5, Step6, Step7, WithFileUploads;

    public int $currentStep = 1;

    public int $maxAllowedStep = 1;

    public int $totalSteps = 7;

    public array $state = [
        'step1' => [
            'investorField' => null,
        ],
        'step2' => [
            'countries' => [],
        ],
        'step3' => [
            'data' => [
                'company' => null,
                'space_type' => null,
                'staff' => null,
                'staff_number' => null,
                'workers' => null,
                'workers_number' => null,
                'executive_spaces' => null,
                'executive_spaces_type' => null,
                'equipment' => null,
                'equipment_type' => null,
                'software' => null,
                'software_type' => null,
                'website' => null,
            ],
            'disableResources' => false,
        ],
        'step4' => [
            'data' => [
                'contribute_type' => null,
                'staff' => null,
                'staff_person_money' => null,
                'money_amount' => null,
                'money_percent' => null,
                'person_money_amount' => null,
                'person_money_percent' => null,
            ],
        ],
        'step5' => [
            'data' => [
                'money_contributions' => null,
            ],
            'disableResources' => false,
        ],
        'step6' => [
            'data' => [
                'investor_title' => null,
                'summary' => null,
                'attachment' => null,
                'created_at' => null,
                'contact_visibility' => 'closed',
            ],
            'job_title' => null,
            'phone' => null,
            'residence_country' => null,
            'birth_date' => null,
            'showProfileFields' => false,
            'currentAttachment' => 'Uploaded File',
        ],
    ];

    public function mount()
    {
        $this->initStep1();
        $this->initStep2();
        $this->initStep3();
        $this->initStep4();
        $this->initStep5();
        $this->initStep6();
        $this->initStep7();
    }

    public function nextStep()
    {
        $method = "validateStep{$this->currentStep}";
        if (method_exists($this, $method)) {
            $this->$method();
        }

        $this->goToNextStep();
    }

    public function goToNextStep()
    {
        if ($this->maxAllowedStep < $this->totalSteps) {
            $this->maxAllowedStep = max($this->maxAllowedStep, $this->currentStep + 1);
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }

        $this->dispatch('livewire-step-changed');
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('livewire-step-changed');
        }
    }

    public function goToStep(int $step)
    {
        if ($step <= $this->maxAllowedStep) {
            $this->currentStep = $step;
            $this->dispatch('livewire-step-changed');
        }
    }

    public function handleNextAction()
    {
        if ($this->currentStep === $this->totalSteps) {
            return $this->save();
        }

        return $this->nextStep();
    }

    public function save()
    {
        return DB::transaction(function () {
            $user = auth()->user();
            $investorId = session('current_investor_id');

            // 1. Update Profile if needed (Step 6)
            if ($this->state['step6']['showProfileFields']) {
                $user->update([
                    'job_title' => $this->state['step6']['job_title'],
                    'phone' => $this->state['step6']['phone'],
                    'residence_country' => $this->state['step6']['residence_country'],
                    'birth_date' => $this->state['step6']['birth_date'],
                ]);
            }

            // 2. Create/Update Investor (Step 1 & 6)
            $investor = Investor::updateOrCreate(
                ['id' => $investorId],
                [
                    'investor_field' => $this->state['step1']['investorField'],
                    'title' => $this->state['step6']['data']['investor_title'],
                    'summary' => $this->state['step6']['data']['summary'],
                    'user_id' => $user->id,
                    'contact_visibility' => $this->state['step6']['data']['contact_visibility'],
                    'created_at' => $this->state['step6']['data']['created_at'] ?? now(),
                ]
            );

            // Credit deduction logic
            if (session('pending_investor_visibility_credit') ||
                ($investor->wasRecentlyCreated && $this->state['step6']['data']['contact_visibility'] === 'open') ||
                ($investor->getOriginal('contact_visibility') === 'closed' && $this->state['step6']['data']['contact_visibility'] === 'open')
            ) {
                // Check if it's already deducted or pending
                // The original code uses a session flag.
                // In Step 6 trait, we set session('pending_investor_visibility_credit') if visibility changed to open.
                if ($user->contact_credits > 0) {
                    $user->decrement('contact_credits');
                }
                session()->forget('pending_investor_visibility_credit');
            }

            // 3. Sync Countries (Step 2)
            $oldCountries = $investor->countries()->pluck('country')->toArray();
            $newCountries = $this->state['step2']['countries'];
            $toInsert = array_diff($newCountries, $oldCountries);
            $toDelete = array_diff($oldCountries, $newCountries);

            foreach ($toInsert as $country) {
                $investor->countries()->create(['country' => $country]);
            }
            if (! empty($toDelete)) {
                $investor->countries()->whereIn('country', $toDelete)->delete();
            }

            // 4. Sync Resource (Step 3)
            if ($this->state['step3']['disableResources']) {
                InvestorResource::where('investor_id', $investor->id)->delete();
            } else {
                InvestorResource::updateOrCreate(
                    ['investor_id' => $investor->id],
                    $this->state['step3']['data']
                );
            }

            // 5. Sync Contribution (Step 4 & 5)
            $contributionData = collect($this->state['step4']['data'])
                ->map(fn ($v) => $v === '' ? null : $v)
                ->toArray();

            if (! $this->state['step5']['disableResources']) {
                $contributionData['money_contributions'] = $this->state['step5']['data']['money_contributions'];
            } else {
                $contributionData['money_contributions'] = null;
            }

            InvestorContribution::updateOrCreate(
                ['investor_id' => $investor->id],
                $contributionData
            );

            // 6. Handle Attachments (Step 6)
            if ($this->state['step6']['data']['attachment']) {
                $this->handleAttachmentUpload($investor, $this->state['step6']['data']['attachment']);
            }

            session()->forget('current_investor_id');

            return $this->redirect(
                route('investor.summary', ['investment' => $investor->id]),
                navigate: true
            );
        });
    }

    public function getInvestorProperty()
    {
        // Mock/Temporary model for Step 7 Summary
        $investor = new Investor([
            'investor_field' => $this->state['step1']['investorField'],
            'title' => $this->state['step6']['data']['investor_title'],
            'summary' => $this->state['step6']['data']['summary'],
            'contact_visibility' => $this->state['step6']['data']['contact_visibility'],
        ]);

        $investor->setRelation('countries', collect($this->state['step2']['countries'])->map(fn ($c) => (object) ['country' => $c]));

        $investor->setRelation('resources', new InvestorResource($this->state['step3']['data']));

        $contributionData = $this->state['step4']['data'];
        $contributionData['money_contributions'] = $this->state['step5']['data']['money_contributions'];
        $investor->setRelation('contributions', new InvestorContribution($contributionData));

        // Handle attachments for preview
        $investorId = session('current_investor_id');
        if ($investorId) {
            $realInvestor = Investor::find($investorId);
            if ($realInvestor) {
                $investor->id = $realInvestor->id;
                $investor->setRelation('attachments', $realInvestor->attachments);
            }
        }

        return $investor;
    }

    #[Title('Find Investor')]
    public function render()
    {
        return view('livewire.pages.investment.investment-form');
    }
}
