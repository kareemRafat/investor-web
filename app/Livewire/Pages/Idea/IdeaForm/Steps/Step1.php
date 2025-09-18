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

        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $this->ideaField = $idea->idea_field;
            }
        }
    }

    #[On('validate-step-1')]
    public function validateStep1()
    {
        $this->validate();

        $this->dbsync();

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

    public function dbsync()
    {
        $ideaId = session('current_idea_id');

        $idea = Idea::updateOrCreate(
            ['id' => $ideaId],
            ['idea_field' => $this->ideaField]
        );

        session(['current_idea_id' => $idea->id]);
    }
}
