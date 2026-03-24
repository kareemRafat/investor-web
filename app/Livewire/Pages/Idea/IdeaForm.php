<?php

namespace App\Livewire\Pages\Idea;

use App\Livewire\Pages\Idea\Traits\Step1;
use App\Livewire\Pages\Idea\Traits\Step2;
use App\Livewire\Pages\Idea\Traits\Step3;
use App\Livewire\Pages\Idea\Traits\Step4;
use App\Livewire\Pages\Idea\Traits\Step5;
use App\Livewire\Pages\Idea\Traits\Step6;
use App\Livewire\Pages\Idea\Traits\Step7;
use App\Livewire\Pages\Idea\Traits\Step8;
use App\Livewire\Pages\Idea\Traits\Step9;
use App\Livewire\Traits\HasFrontendValidation;
use App\Models\Idea;
use App\Models\IdeaContribution;
use App\Models\IdeaCost;
use App\Models\IdeaExpense;
use App\Models\IdeaProfit;
use App\Models\IdeaResource;
use App\Models\IdeaReturn;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class IdeaForm extends Component
{
    use HasFrontendValidation, Step1, Step2, Step3, Step4, Step5, Step6, Step7, Step8, Step9, WithFileUploads;

    public int $currentStep = 1;

    public int $maxAllowedStep = 1;

    public int $totalSteps = 10;

    public array $state = [
        'step1' => [
            'ideaField' => null,
        ],
        'step2' => [
            'countries' => [],
        ],
        'step3' => [
            'cost_type' => null,
            'range_id' => null,
        ],
        'step4' => [
            'profit_type' => null,
            'profit_range_id' => null,
        ],
        'step5' => [
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
        ],
        'step6' => [
            'data' => [
                'company' => null,
                'assets' => null,
                'salaries' => null,
                'operating' => null,
                'other' => null,
            ],
        ],
        'step7' => [
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
        'step8' => [
            'data' => [
                'profit_only_percentage' => null,
                'one_time_dollar' => null,
                'one_time_sar' => null,
                'combo_dollar' => null,
                'combo_sar' => null,
                'combo_percentage' => null,
                'return_type' => null,
            ],
        ],
        'step9' => [
            'data' => [
                'idea_title' => null,
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
        $this->initStep8();
        $this->initStep9();
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
            $ideaId = session('current_idea_id');

            // 1. Update Profile if needed (Step 9)
            if ($this->state['step9']['showProfileFields']) {
                $user->update([
                    'job_title' => $this->state['step9']['job_title'],
                    'phone' => $this->state['step9']['phone'],
                    'residence_country' => $this->state['step9']['residence_country'],
                    'birth_date' => $this->state['step9']['birth_date'],
                ]);
            }

            // 2. Create/Update Idea (Step 1 & 9)
            $idea = Idea::updateOrCreate(
                ['id' => $ideaId],
                [
                    'idea_field' => $this->state['step1']['ideaField'],
                    'title' => $this->state['step9']['data']['idea_title'],
                    'summary' => $this->state['step9']['data']['summary'],
                    'user_id' => $user->id,
                    'contact_visibility' => $this->state['step9']['data']['contact_visibility'],
                    'created_at' => $this->state['step9']['data']['created_at'] ?? now(),
                ]
            );

            // Credit deduction logic
            if (session('pending_idea_visibility_credit') ||
                ($idea->wasRecentlyCreated && $this->state['step9']['data']['contact_visibility'] === 'open') ||
                ($idea->getOriginal('contact_visibility') === 'closed' && $this->state['step9']['data']['contact_visibility'] === 'open')
            ) {
                if ($user->contact_credits > 0) {
                    $user->decrement('contact_credits');
                }
                session()->forget('pending_idea_visibility_credit');
            }

            // 3. Sync Countries (Step 2)
            $oldCountries = $idea->countries()->pluck('country')->toArray();
            $newCountries = $this->state['step2']['countries'];
            $toInsert = array_diff($newCountries, $oldCountries);
            $toDelete = array_diff($oldCountries, $newCountries);

            foreach ($toInsert as $country) {
                $idea->countries()->create(['country' => $country]);
            }
            if (! empty($toDelete)) {
                $idea->countries()->whereIn('country', $toDelete)->delete();
            }

            // 4. Sync Costs (Step 3)
            $idea->costs()->updateOrCreate(
                ['idea_id' => $idea->id],
                [
                    'cost_type' => $this->state['step3']['cost_type'],
                    'range_id' => $this->state['step3']['range_id'],
                ]
            );

            // 5. Sync Profits (Step 4)
            $idea->profits()->updateOrCreate(
                ['idea_id' => $idea->id],
                [
                    'profit_type' => $this->state['step4']['profit_type'],
                    'range_id' => $this->state['step4']['profit_range_id'],
                ]
            );

            // 6. Sync Resources (Step 5)
            IdeaResource::updateOrCreate(
                ['idea_id' => $idea->id],
                $this->state['step5']['data']
            );

            // 7. Sync Expenses (Step 6)
            IdeaExpense::updateOrCreate(
                ['idea_id' => $idea->id],
                $this->state['step6']['data']
            );

            // 8. Sync Contribution (Step 7)
            $contributionData = collect($this->state['step7']['data'])
                ->map(fn ($v) => $v === '' ? null : $v)
                ->toArray();

            IdeaContribution::updateOrCreate(
                ['idea_id' => $idea->id],
                $contributionData
            );

            // 9. Sync Returns (Step 8)
            $returnData = collect($this->state['step8']['data'])
                ->map(fn ($v) => $v === '' ? null : $v)
                ->toArray();

            IdeaReturn::updateOrCreate(
                ['idea_id' => $idea->id],
                $returnData
            );

            // 10. Handle Attachments (Step 9)
            if ($this->state['step9']['data']['attachment']) {
                $this->handleAttachmentUpload($idea, $this->state['step9']['data']['attachment']);
            }

            session()->forget('current_idea_id');

            return $this->redirect(
                route('idea.summary', ['idea' => $idea->id]),
                navigate: true
            );
        });
    }

    public function getIdeaProperty()
    {
        // Mock model for Step 10 Summary
        $idea = new Idea([
            'idea_field' => $this->state['step1']['ideaField'],
            'title' => $this->state['step9']['data']['idea_title'],
            'summary' => $this->state['step9']['data']['summary'],
            'contact_visibility' => $this->state['step9']['data']['contact_visibility'],
        ]);

        $idea->setRelation('countries', collect($this->state['step2']['countries'])->map(fn ($c) => (object) ['country' => $c]));
        $idea->setRelation('costs', collect([new IdeaCost([
            'cost_type' => $this->state['step3']['cost_type'],
            'range_id' => $this->state['step3']['range_id'] ? (int) $this->state['step3']['range_id'] : null,
        ])]));
        $idea->setRelation('profits', collect([new IdeaProfit([
            'profit_type' => $this->state['step4']['profit_type'],
            'range_id' => $this->state['step4']['profit_range_id'] ? (int) $this->state['step4']['profit_range_id'] : null,
        ])]));
        $idea->setRelation('resources', collect([new IdeaResource($this->state['step5']['data'])]));
        $idea->setRelation('expenses', collect([new IdeaExpense($this->state['step6']['data'])]));
        $idea->setRelation('contributions', collect([new IdeaContribution($this->state['step7']['data'])]));
        $idea->setRelation('returns', new IdeaReturn($this->state['step8']['data']));

        // Real attachments if we have an ID
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $realIdea = Idea::find($ideaId);
            if ($realIdea) {
                $idea->id = $realIdea->id;
                $idea->setRelation('attachments', $realIdea->attachments);
            }
        }

        return $idea;
    }

    #[Title('Submit Your Idea')]
    public function render()
    {
        return view('livewire.pages.idea.idea-form', [
            'idea' => $this->idea,
            'ideaOptions' => __('idea.steps.step1.options'),
            'step2Options' => __('idea.steps.step2.options'),
            'oneTimeRanges' => \App\Enums\CostProfitRange::filterByType('one-time'),
            'annualRanges' => \App\Enums\CostProfitRange::filterByType('annual'),
            'oneTimeProfitRanges' => \App\Enums\CostProfitRange::filterByType('one-time'),
            'annualProfitRanges' => \App\Enums\CostProfitRange::filterByType('annual'),
        ]);
    }
}
