<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step3 extends Component
{

    #[Validate([
        'profit_type'  => 'required|in:one-time,annual',
        'profit_range' => 'required|string',
    ])]
    public ?string $profit_type = null;
    public ?string $profit_range = null;

    // لو اختار one-time من اليمين
    public function updatedProfitRange($value)
    {
        if (str_starts_with($value, 'one-time')) {
            $this->profit_type = 'one-time';
        }

        if (str_starts_with($value, 'annual')) {
            $this->profit_type = 'annual';
        }
    }
    #[On('validate-step-3')]
    public function validateStep1()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step3');
    }
}
