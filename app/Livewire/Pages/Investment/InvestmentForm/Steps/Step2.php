<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step2 extends Component
{
    #[Validate([
        'countries'   => 'required|array|min:1|max:3',
        'countries.*' => 'string',
    ])]
    public array $countries = [];

    public array $options = [];

    public function mount(): void
    {
        $this->options = __('investor.steps.step2.options');
        $investorId = session('current_investor_id');
        if ($investorId) {
            $this->countries = Investor::find($investorId)
                ->countries()
                ->pluck('country')
                ->toArray();
        }
    }

    #[On('validate-step-2')]
    public function validateStep2()
    {
        $this->validate();

        $this->syncCountries();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step2');
    }

    public function messages()
    {
        return [
            'countries.required' => __('investor.validation.step2.countries'),
        ];
    }

    public function syncCountries(): void
    {
        $investorId = session('current_investor_id');

        if (!$investorId) {
            $this->addError('countries', 'Investor not found in session.');
            return;
        }

        $investor = Investor::find($investorId);

        if (!$investor) {
            $this->addError('countries', 'Investor not found.');
            return;
        }

        // old values
        $oldCountries = $investor->countries()->pluck('country')->toArray();

        // new values
        $newCountries = $this->countries;

        // to be added
        $toInsert = array_diff($newCountries, $oldCountries);

        // to be deleted
        $toDelete = array_diff($oldCountries, $newCountries);

        // Insert new
        foreach ($toInsert as $country) {
            $investor->countries()->create(['country' => $country]);
        }

        // Delete what should be deleted
        if (!empty($toDelete)) {
            $investor->countries()->whereIn('country', $toDelete)->delete();
        }
    }
}
