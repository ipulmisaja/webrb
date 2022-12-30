<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputText extends Component
{
    public $model;
    public $title;
    public $option;
    public $height;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $model, $option = false, $height = null)
    {
        $this->title  = $title;
        $this->model  = $model;
        $this->option = $option;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-text');
    }
}
