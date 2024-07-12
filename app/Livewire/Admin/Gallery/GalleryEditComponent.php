<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryEditComponent extends Component
{
    use WithFileUploads;
    public $image, $desc, $order, $status, $newImage, $editId;

//    protected $rules = [
//        'newImage' => 'required|image|max:1024',
//    ];

    public function render()
    {
        return view('livewire.admin.gallery.gallery-edit-component')
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $item = Gallery::findOrFail($id);
        $this->editId = $item->id;
        $this->image = $item->image;
        $this->desc = $item->desc;
        $this->order = $item->order;
        $this->status = $item->status;
    }

    public function update()
    {
        $item = Gallery::findOrFail($this->editId);
        $item->desc = $this->desc;
        $item->status = $this->status;
        $item->order = $this->order;
        if ($this->newImage){
            if (file_exists('gallery/'.$this->image)){
                unlink('gallery/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('gallery/', $imageName);
            $item->image = $imageName;
        }
        $item->update();
        $this->resetInputFields();
        session()->flash('success', 'Data updated!');
        $this->redirect('/admin/gallery', true);
    }

    public function resetInputFields()
    {
        $this->title ='';
        $this->content ='';
        $this->published ='';
        $this->order =0;
        $this->publish_date ='';
        $this->author ='';
        $this->image ='';
    }
}
