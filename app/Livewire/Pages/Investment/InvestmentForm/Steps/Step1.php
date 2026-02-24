<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use App\Models\Investor;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Step1 extends Component
{
    #[Validate('required')]
    public $investorField;

    public array $investorOptions = [];

    public function mount()
    {
        $this->investorOptions = __('investor.steps.step1.options');

        // if return back
        $investorId = session('current_investor_id');
        if ($investorId) {
            $investor = Investor::find($investorId);
            if ($investor) {
                $this->investorField = $investor->investor_field;
            }
        }
    }

    #[On('validate-step-1')]
    public function validateStep1()
    {
        $this->validate();

        $this->syncField();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step1');
    }

    public function messages()
    {
        return [
            'investorField.required' => __('investor.validation.step1.investor_field'),
        ];
    }

    public function syncField()
    {
        $investorId = session('current_investor_id');

        $investor = Investor::updateOrCreate(
            ['id' => $investorId],
            ['investor_field' => $this->investorField]
        );

        session(['current_investor_id' => $investor->id]);
    }
}
