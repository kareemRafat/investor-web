<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step6 extends Component
{
    #[Validate([
        'data.company' => 'required|numeric|min:0|max:100',
        'data.assets' => 'required|numeric|min:0|max:100',
        'data.salaries' => 'required|numeric|min:0|max:100',
        'data.operating' => 'required|numeric|min:0|max:100',
        'data.other' => 'required|numeric|min:0|max:100',
    ])]
    public array $data = [
        'company' => null,
        'assets' => null,
        'salaries' => null,
        'operating' => null,
        'other' => null,
    ];

    public function mount(): void
    {
        //!!! data found if the user return back
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $expenses = $idea->expenses()->first(); // relation expenses()
                if ($expenses) {
                    $this->data = $expenses->only(array_keys($this->data));
                }
            }
        }
    }

    #[On('validate-step-6')]
    public function validateStep6()
    {
        $this->validate();

        // all numbers inserted must be 100%
        $total = array_sum($this->data);
        if ($total !== 100) {
            $this->addError('total', __('idea.steps.step6.must_equal'));
            return;
        }

        // continue with session of the idea
        $ideaId = session('current_idea_id');
        if (!$ideaId) {
            $this->addError('data.company', 'Idea not found in session.');
            return;
        }

        $idea = Idea::find($ideaId);
        if (!$idea) {
            $this->addError('data.company', 'Idea not found.');
            return;
        }

        // DB sync
        $this->syncExpenses($idea);

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step6');
    }

    public function messages()
    {
        return [
            // step6
            'data.company.*'   => __('idea.validation.step6.company'),
            'data.assets.*'    => __('idea.validation.step6.assets'),
            'data.salaries.*'  => __('idea.validation.step6.salaries'),
            'data.operating.*' => __('idea.validation.step6.operating'),
            'data.other.*'     => __('idea.validation.step6.other'),
        ];
    }

    /**
     * Sync expenses: update existing row or create a new one.
     */
    private function syncExpenses(Idea $idea): void
    {
        $idea->expenses()->updateOrCreate(
            ['idea_id' => $idea->id],
            $this->data
        );
    }
}
