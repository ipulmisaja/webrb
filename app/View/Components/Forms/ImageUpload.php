<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class ImageUpload extends Component
{
    public $model;
    public $thumbnail;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $model, $thumbnail = null)
    {
        $this->model = $model;
        $this->title = $title;
        $this->thumbnail = $thumbnail;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.image-upload');
    }
}
