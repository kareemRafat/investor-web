<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step4 extends Component
{

    #[Validate([
        'profit_type'  => 'required|in:one-time,annual',
        'profit_range' => 'required|string',
    ])]
    public ?string $profit_type = null;

    public ?string $profit_range = null;

    // لما يغير الـ profit_range
    public function updatedProfitRange($value)
    {
        if (str_starts_with($value, 'one-time')) {
            $this->profit_type = 'one-time';
        }

        if (str_starts_with($value, 'annual')) {
            $this->profit_type = 'annual';
        }
    }

    // لما يغير نوع الأرباح (ويفضي الاختيارات التانية)
    public function updatedProfitType($value)
    {
        if ($value === 'one-time' && str_starts_with($this->profit_range ?? '', 'annual')) {
            $this->profit_range = null;
        }

        if ($value === 'annual' && str_starts_with($this->profit_range ?? '', 'one-time')) {
            $this->profit_range = null;
        }
    }

    #[On('validate-step-4')]
    public function validateStep4()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }
    
    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step4');
    }
}
