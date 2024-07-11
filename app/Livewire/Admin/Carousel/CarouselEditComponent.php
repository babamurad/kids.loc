<?php

namespace App\Livewire\Admin\Carousel;

use App\Models\Carousel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarouselEditComponent extends Component
{
    use WithFileUploads;
    public $title, $image, $status, $order;
    public $newImage, $editId;

    protected $rules = [
        'title' => 'required|string|max:50',
    ];

    public function render()
    {
        return view('livewire.admin.carousel.carousel-edit-component')
        ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $item = Carousel::findOrFail($id);
        $this->editId = $item->id;
        $this->title = $item->title;
        $this->order = $item->order;
        $this->status = $item->status;
        $this->image = $item->image;
    }

    public function update()
    {
        $this->validate();
        
        $item = Carousel::findOrFail($this->editId);
        $item->title = $this->title;
        $item->status = $this->status;
        $item->order = $this->order;
        
        if ($this->newImage){
            
            if (file_exists('images/carousel/'.$this->image)){
                //dd('images/carousel/'.$this->image);
                unlink('images/carousel/'.$this->image);
            }// else {dd('yok');}
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('carousel/', $imageName);
            $item->image = $imageName;
        }
        $item->update();
        
        $this->resetInputFields();
        session()->flash('success', 'Data updated!');
        return redirect()->to('/admin/carousel');
    }

    public function resetInputFields()
    {
        $this->title ='';
        $this->status ='';
        $this->order =0;
        $this->image ='';
    }
}
