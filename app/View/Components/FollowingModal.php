<?php

namespace App\View\Components;

use Illuminate\View\Component;

final class FollowingModal extends Component
{
    public $following;

    public $me;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($following, $me)
    {
        $this->following = $following;
        $this->me = $me;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.following');
    }
}
