<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ScheduleCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $item;
    public function __construct($schedule)
    {
        $this->item = $schedule;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.schedule_card');
    }
}
