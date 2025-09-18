<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step1 extends Component
{
    #[Validate('required')]
    public $ideaField;

    public array $ideaOptions = [];

    public function mount(): void
    {
        $this->ideaOptions = __('idea.steps.step1.options');
    }

    #[On('validate-step-1')]
    public function validateStep1()
    {
        $this->validate();

        $idea = Idea::create([
            'idea_field' => $this->ideaField,
        ]);

        session(['current_idea_id' => $idea->id]);

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step1');
    }

    public function messages()
    {
        return [
            'ideaField.required' => __('idea.validation.step1.idea_field'),
        ];
    }
}
