<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HiddenClientDate extends Component
{
    public string $wireModel;

    /**
     * Create a new component instance.
     */
    public function __construct(string $wireModel = 'data.created_at')
    {
        $this->wireModel = $wireModel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.hidden-client-date');
    }
}
