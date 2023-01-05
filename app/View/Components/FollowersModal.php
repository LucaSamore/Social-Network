<?php

namespace App\View\Components;

use Illuminate\View\Component;

final class FollowersModal extends Component
{
    public $followers;

    public $me;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($followers, $me)
    {
        $this->followers = $followers;
        $this->me = $me;
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
