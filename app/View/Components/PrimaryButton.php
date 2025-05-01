<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrimaryButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $icon = "warning",
        public string $text = "You won't be able to revert this!",
        public string $title = "Are you sure?",
    ) {

        $this->icon = $icon;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.primary-button');
    }
}
