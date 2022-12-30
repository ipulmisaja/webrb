<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputDate extends Component
{
    public $model;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $model)
    {
        $this->model = $model;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-date');
    }
}
