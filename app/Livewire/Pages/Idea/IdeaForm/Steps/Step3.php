<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

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

    public array $types = [];
    public array $ranges = [];

    public function mount()
    {
        $this->types = [
            'one-time' => __('idea.costs.one_time'),
            'annual'   => __('idea.costs.annual'),
        ];

        $this->ranges = [
            'one-time' => [
                'one-time-1' => __('idea.costs.one_time_ranges.1'),
                'one-time-2' => __('idea.costs.one_time_ranges.2'),
                'one-time-3' => __('idea.costs.one_time_ranges.3'),
                'one-time-4' => __('idea.costs.one_time_ranges.4'),
                'one-time-5' => __('idea.costs.one_time_ranges.5'),
                'one-time-6' => __('idea.costs.one_time_ranges.6'),
                'one-time-7' => __('idea.costs.one_time_ranges.7'),
            ],
            'annual' => [
                'annual-1' => __('idea.costs.annual_ranges.1'),
                'annual-2' => __('idea.costs.annual_ranges.2'),
                'annual-3' => __('idea.costs.annual_ranges.3'),
                'annual-4' => __('idea.costs.annual_ranges.4'),
                'annual-5' => __('idea.costs.annual_ranges.5'),
                'annual-6' => __('idea.costs.annual_ranges.6'),
                'annual-7' => __('idea.costs.annual_ranges.7'),
            ],
        ];
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
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step3');
    }
}
