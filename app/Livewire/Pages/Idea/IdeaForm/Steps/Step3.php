<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\CostProfitRange;
use App\Models\Idea;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Step3 extends Component
{
    #[Validate([
        'cost_type' => 'required|in:one-time,annual',
        'range_id' => 'required|exists:cost_profit_ranges,id',
    ])]
    public ?string $cost_type = null;

    public ?int $range_id = null;

    public function mount(): void
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $cost = $idea->costs()->first();
                if ($cost) {
                    $this->cost_type = $cost->cost_type;
                    $this->range_id = $cost->range_id;
                }
            }
        }
    }

    #[On('validate-step-3')]
    public function validateStep3()
    {
        $this->validate();

        $ideaId = session('current_idea_id');
        if (! $ideaId) {
            $this->addError('cost_range', 'Idea not found in session.');

            return;
        }

        $idea = Idea::find($ideaId);
        if (! $idea) {
            $this->addError('cost_range', 'Idea not found.');

            return;
        }

        // DB sync
        $this->syncCost($idea);

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step3', [
            'oneTimeRanges' => CostProfitRange::where('type', 'one-time')->get(),
            'annualRanges' => CostProfitRange::where('type', 'annual')->get(),
        ]);
    }

    public function messages()
    {
        return [
            'cost_type.*' => __('idea.validation.step3.cost_type'),
            'cost_range.*' => __('idea.validation.step3.cost_range'),
            'range_id.*' => __('idea.validation.step3.cost_range'),
        ];
    }

    /**
     * Sync cost: update existing cost row or create a new one.
     */
    private function syncCost(Idea $idea): void
    {
        $existing = $idea->costs()->first();

        $data = [
            'cost_type' => $this->cost_type,
            'range_id' => $this->range_id,
        ];

        if ($existing) {
            $existing->update($data);
        } else {
            $idea->costs()->create($data);
        }
    }
}
