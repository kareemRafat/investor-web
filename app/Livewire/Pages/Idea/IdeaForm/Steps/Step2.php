<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step2 extends Component
{

    #[Validate([
        'countries'   => 'required|array|size:3',
        'countries.*' => 'string',
    ])]
    public array $countries = [];

    public array $options = [
        'Lebanon',
        'Tunisia',
        'Algeria',
        'Jordan',
        'Saudi Arabia',
        'Qatar',
        'Oman',
        'Morocco',
        'Libya',
        'Sudan',
        'Palestine',
        'Iraq',
        'Iran',
        'Turkey',
        'North Africa',
        'Levant',
        'Gulf countries',
        'United Arab Emirates',
        'Kuwait',
        'Bahrain',
        'Egypt',
        'America and Australia continent',
        'Central and Southern Africa',
        'European Union',
        'China',
        'India and Pakistan',
        'Middle East and North Africa',
        'Middle East',
        'Yemen'
    ];

    #[On('validate-step-2')]
    public function validateStep2()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step2');
    }
}
