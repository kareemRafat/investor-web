<?php

namespace App\Livewire\Pages\Idea\Components;

use Livewire\Component;
use App\Models\Countryable;

class IdeaFilters extends Component
{
    public $field = "" ;
    public $country = "" ;

    public function render()
    {
        return view('livewire.pages.idea.components.idea-filters');
    }
}
