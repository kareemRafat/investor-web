<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use App\Models\IdeaCountry;
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

        $this->options = __('idea.steps.step2.options');

        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $this->countries = IdeaCountry::where('idea_id', $ideaId)
                ->pluck('country')
                ->toArray();
        }
    }

    #[On('validate-step-2')]
    public function validateStep2()
    {
        $this->validate();

        $this->dbInsert();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step2');
    }

    public function messages()
    {
        return [
            'countries.required' => __('idea.validation.step2.countries'),
        ];
    }

    public function dbInsert()
    {
        $ideaId = session('current_idea_id');

        if (!$ideaId) {
            $this->addError('countries', 'Idea not found in session.');
            return;
        }

        // sync data when the client return back and chage the countries
        $idea = Idea::find($ideaId);

        // old values
        $oldCountries = $idea->countries()->pluck('country')->toArray();

        // new values
        $newCountries = $this->countries;

        // to be added
        $toInsert = array_diff($newCountries, $oldCountries);

        // to be deleted
        $toDelete = array_diff($oldCountries, $newCountries);

        // Insert new
        foreach ($toInsert as $country) {
            $idea->countries()->create(['country' => $country]);
        }

        // Delete what should deleted
        if (!empty($toDelete)) {
            $idea->countries()->whereIn('country', $toDelete)->delete();
        }
    }
}
