<?php

namespace App\View\Components;

use Illuminate\View\Component;

final class FolloweesModal extends Component
{
    public $followees;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($followees)
    {
        $this->followees = $followees;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.followees');
    }
}
