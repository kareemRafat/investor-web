<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step3 extends Component
{
    #[Validate([
        'cost_type'  => 'required|in:one-time,annual',
        'cost_range' => 'required|string',
    ])]
    public ?string $cost_type = null;
    public ?string $cost_range = null;

    public function mount(): void
    {
        // data found if the user return back
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $cost = $idea->costs()->first();
                if ($cost) {
                    $this->cost_type  = $cost->cost_type;
                    $this->cost_range = $cost->cost_range;
                }
            }
        }
    }

    public function updatedCostRange($value)
    {
        if (str_starts_with($value, 'one-time')) {
            $this->cost_type = 'one-time';
        }

        if (str_starts_with($value, 'annual')) {
            $this->cost_type = 'annual';
        }
    }

    #[On('validate-step-3')]
    public function validateStep3()
    {
        $this->validate();

        $ideaId = session('current_idea_id');
        if (!$ideaId) {
            $this->addError('cost_range', 'Idea not found in session.');
            return;
        }

        $idea = Idea::find($ideaId);
        if (!$idea) {
            $this->addError('cost_range', 'Idea not found.');
            return;
        }

        // DB sync
        $this->syncCost($idea);

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step3');
    }

    public function messages()
    {
        return [
            'cost_type.*'  => __('idea.validation.step3.cost_type'),
            'cost_range.*' => __('idea.validation.step3.cost_range'),
        ];
    }

    /**
     * Sync cost: update existing cost row or create a new one.
     */
    private function syncCost(Idea $idea): void
    {
        // أفضل طريقة: نحاول نجيب السطر الحالي، لو موجود نعمل update، لو مش موجود نعمل create
        $existing = $idea->costs()->first();

        $data = [
            'cost_type'  => $this->cost_type,
            'cost_range' => $this->cost_range,
        ];

        if ($existing) {
            $existing->update($data);
        } else {
            $idea->costs()->create($data);
        }
    }
}
