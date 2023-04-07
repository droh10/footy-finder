<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class CreateSchedule extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $schedule;
    public function __construct($schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.create-schedule');
    }
}
