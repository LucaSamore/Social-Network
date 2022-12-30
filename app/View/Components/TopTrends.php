<?php

namespace App\View\Components;

use Illuminate\View\Component;

final class TopTrends extends Component
{
    /**
     * Top ten trends
     *
     * @var array<string,string>
     */
    public $trends;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trends)
    {
        $this->trends = $trends;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-trends');
    }
}
