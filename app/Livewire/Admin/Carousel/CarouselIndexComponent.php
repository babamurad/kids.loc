<?php

namespace App\Livewire\Admin\Carousel;

use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithPagination;

class CarouselIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $del_id;
    public $image;
    public $orEdit = false;

    public function render()
    {
        $carousels = Carousel::paginate();


        return view('livewire.admin.carousel.carousel-index-component', compact('carousels'))
        ->layout('components.layouts.admin-app');
    }

    public function orderEdit()
    {
        $this->orEdit = !$this->orEdit;
    }

    public function deleteId($id)
    {
        $this->del_id = $id;
    }

    public function destroy()
    {
        $item = Carousel::findOrFail($this->del_id);
        $this->image = $item->image;
        if (file_exists('images/carousel/'.$this->image)){
            unlink('images/carousel/'.$this->image);
        }
        $item->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }

    public function PubUnPub($id)
    {
        $item = Carousel::findOrFail($id);
        $item->status = !$item->status;
        $item->update();
    }

    public function IncOrder($id)
    {
        $item = Carousel::findOrFail($id);
        $item->order = ++$item->order;
        $item->update();
    }

    public function DecOrder($id)
    {
        $item = Carousel::findOrFail($id);
        $item->order = --$item->order;
        $item->update();
    }


}
