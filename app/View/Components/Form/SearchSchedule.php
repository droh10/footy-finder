<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SearchSchedule extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $url;
    public function __construct($searchUrl)
    {
        $this->url = $searchUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.search-schedule');
    }
}
