<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\CostProfitRange;
use App\Models\Idea;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Step4 extends Component
{
    #[Validate([
        'profit_type' => 'required|in:one-time,annual',
        'profit_range_id' => 'required|exists:cost_profit_ranges,id',
    ])]
    public ?string $profit_type = null;

    public ?int $profit_range_id = null;

    public function mount(): void
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $profit = $idea->profits()->first();
                if ($profit) {
                    $this->profit_type = $profit->profit_type;
                    $this->profit_range_id = $profit->range_id;
                }
            }
        }
    }

    public function updatedProfitRange($value)
    {
        if (str_starts_with($value, 'one-time')) {
            $this->profit_type = 'one-time';
        }

        if (str_starts_with($value, 'annual')) {
            $this->profit_type = 'annual';
        }
    }

    #[On('validate-step-4')]
    public function validateStep4()
    {
        $this->validate();

        // continue with session of the idea
        $ideaId = session('current_idea_id');
        if (! $ideaId) {
            $this->addError('profit_range', 'Idea not found in session.');

            return;
        }

        $idea = Idea::find($ideaId);
        if (! $idea) {
            $this->addError('profit_range', 'Idea not found.');

            return;
        }

        // Sync DB
        $this->syncProfit($idea);

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step4', [
            'oneTimeRanges' => CostProfitRange::where('type', 'one-time')->get(),
            'annualRanges' => CostProfitRange::where('type', 'annual')->get(),
        ]);
    }

    public function messages()
    {
        return [
            'profit_type.*' => __('idea.validation.step4.profit_type'),
            'profit_range.*' => __('idea.validation.step4.profit_range'),
            'profit_range_id.*' => __('idea.validation.step4.profit_range'),
        ];
    }

    /**
     * Sync profit: update existing row or create a new one.
     */
    private function syncProfit(Idea $idea): void
    {
        $existing = $idea->profits()->first();

        $data = [
            'profit_type' => $this->profit_type,
            'range_id' => $this->profit_range_id,
        ];

        if ($existing) {
            $existing->update($data);
        } else {
            $idea->profits()->create($data);
        }
    }
}
