<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use App\Models\CostProfitRange;
use App\Models\InvestorContribution;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Step5 extends Component
{
    public bool $disableResources = false;

    #[Validate([
        'data.money_contributions' => 'required|integer|min:1',
    ])]
    public array $data = [
        'money_contributions' => null,
    ];

    public function mount(): void
    {
        $investorId = session('current_investor_id');

        if ($investorId) {
            $contribution = InvestorContribution::where('investor_id', $investorId)->first();

            // افحص العمود فقط
            $this->disableResources = ! $contribution || is_null($contribution->money_contributions);

            if ($contribution) {
                $this->data = array_merge(
                    $this->data,
                    $contribution->only(array_keys($this->data))
                );
            }
        }
    }

    public function updatedDisableResources($value)
    {
        // this function to use it not to empty the investor_id and uncheck all other feilds
        if ($value) {
            $requiredFields = ['investor_id']; // excepted field
            $this->data = collect($this->data)
                ->mapWithKeys(fn ($v, $k) => in_array($k, $requiredFields) ? [$k => $v] : [$k => null])
                ->toArray();
        }
    }

    #[On('validate-step-5')]
    public function validateStep5()
    {
        if (! $this->disableResources) {
            $this->validate();
        }

        $this->syncContribution();

        $this->dispatch('go-to-next-step');
    }

    public function syncContribution(): void
    {
        $investorId = session('current_investor_id');

        if ($investorId) {
            $clean = collect($this->data)
                ->map(fn ($v) => $v === '' ? null : $v)
                ->toArray();

            InvestorContribution::updateOrCreate(
                ['investor_id' => $investorId],
                $clean
            );
        }
    }

    public function messages()
    {
        return [
            'data.money_contributions.required' => __('investor.validation.step5.required'),
            'data.money_contributions.integer' => __('investor.validation.step5.invalid'),
        ];
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step5', [
            'moneyRanges' => CostProfitRange::where('type', 'money_contribution')->orderBy('id')->get(),
        ]);
    }
}
