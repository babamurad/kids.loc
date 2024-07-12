<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryComponent extends Component
{
    public $limit;
    public $btn;

    public function mount($limit = null)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $gallery = $this->limit ? Gallery::status()->orderBy('order')->take($this->limit)->get() : Gallery::status()->orderBy('order')->get();
        //$gallery = Gallery::status()->orderBy('order')->get();
        return view('livewire.gallery-component', compact('gallery'));
    }
}
