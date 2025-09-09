<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step1 extends Component
{
    #[Validate('required')]
    public $ideaField ;

    public array $ideaOptions = [
        'health' => 'Health and beauty',
        'food' => 'Restaurants and food',
        'industry' => 'Industry',
        'marketing' => 'Marketing and advertising',
        'public' => 'Public services',
        'designs' => 'Architectural and artistic designs',
        'agriculture' => 'Agriculture',
        'websites' => 'Websites',
        'technology' => 'Communications and technology',
        'tourism' => 'Travel and Tourism',
        'mining' => 'Mining',
        'media' => 'Media and publishing',
        'games' => 'Electronic Games',
        'banking' => 'Financial and banking services',
        'other' => 'Other',
        'retail' => 'General trade and retail',
        'government' => 'Government sector services',
        'transport' => 'Storage and transportation',
        'vehicles' => 'Vehicles and engines',
        'software' => 'Software and applications',
        'entertainment' => 'Entertainment and leisure',
        'contracting' => 'Contracting',
        'systems' => 'Transportation systems',
        'education' => 'Science and education',
        'realestate' => 'Real estate and urban development',
        'environment' => 'Environmental protection and sustainability',
    ];

    #[On('validate-step-1')]
    public function validateStep1()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step1');
    }
}
