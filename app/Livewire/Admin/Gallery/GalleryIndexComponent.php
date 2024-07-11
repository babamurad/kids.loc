<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $delId;
    public $image;

    public function render()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(6);
        return view('livewire.admin.gallery.gallery-index-component', compact('galleries'))
            ->layout('components.layouts.admin-app');
    }

    public function deleteId($id)
    {
        $this->delId = $id;
    }

    public function destroy()
    {
        $item = Gallery::findOrFail($this->delId);
        $this->image = $item->image;
        if (file_exists('images/gallery/'.$this->image)){
            unlink('images/gallery/'.$this->image);
        }
        $item->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }

    public function cancel()
    {
        $this->delId = '';
    }

    public function PubUnPub($id)
    {
        $item = Gallery::findOrFail($id);
        $item->status = !$item->status;
        $item->update();
    }

    public function IncOrder($id)
    {
        $item = Gallery::findOrFail($id);
        $item->order = ++$item->order;
        $item->update();
    }

    public function DecOrder($id)
    {
        $item = Gallery::findOrFail($id);
        $item->order = --$item->order;
        $item->update();
    }
}
