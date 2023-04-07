<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SearchBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $search_url;
    public function __construct($search_url)
    {
        dd($search_url);
        $this->search_url = $search_url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.search_bar');
    }
}
