<?php

namespace App\Livewire;

use App\Models\Carousel;
use Livewire\Component;

class CarouselComponent extends Component
{
    public function render()
    {
        $carousel = Carousel::status()->orderBy('order')->get();
        return view('livewire.carousel-component', compact('carousel'));
    }
}
