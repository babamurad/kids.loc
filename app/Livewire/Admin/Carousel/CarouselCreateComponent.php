<?php

namespace App\Livewire\Admin\Carousel;

use App\Models\Carousel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarouselCreateComponent extends Component
{
    use WithFileUploads;
    public $title, $image, $status, $order;

    protected $rules = [
        'title' => 'required|string|max:50',
        'image' => 'required|image|max:1024',
    ];

    public function render()
    {
        return view('livewire.admin.carousel.carousel-create-component')
        ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $this->validate();
        $item = new Carousel();
        $item->title = $this->title;
        $item->order = $this->order;
        $item->status = $this->status;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/carousel', $imageName);
        $item->image = $imageName;
        $item->save();

        session()->flash('success', 'Успешно добавлен!');
        return redirect()->to('/admin/carousel');
    }
}
