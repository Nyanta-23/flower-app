<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    /**
     * Create a new component instance.
     */

    public $headingTitle;
    public $linkTo;

    public function __construct(
        $headingTitle = null,
        $linkTo = "#"
    ) {
        $this->headingTitle = $headingTitle;
        $this->linkTo = $linkTo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back');
    }
}
