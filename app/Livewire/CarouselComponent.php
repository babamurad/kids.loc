<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\Carousel;
use Livewire\Component;

class CarouselComponent extends Component
{
    public $type;

    public function mount($type = 'carousel')
    {
        $this->type = $type;
    }

    public function render()
    {
        $image = Banner::where('id', 2)->value('image');
        $carousel = Carousel::status()->orderBy('order')->get();
        return view('livewire.carousel-component', compact('carousel', 'image'));
    }

    public function toAboutUs()
    {
        return $this->redirect('/about-us', navigate: true);
    }
}
