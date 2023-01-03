<?php

namespace App\View\Components;

use Illuminate\View\Component;

final class FollowersModal extends Component
{
    public $followers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($followers)
    {
        $this->followers = $followers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.followers');
    }
}
