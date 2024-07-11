<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryCreateComponent extends Component
{
    use WithFileUploads;
    public $image, $desc, $order, $status;
    protected $rules = [
        'image' => 'required|image|max:1024',
    ];

    public function render()
    {
        return view('livewire.admin.gallery.gallery-create-component')
            ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $this->validate();

        $item = new Gallery();
        $item->desc = $this->desc;
        $item->order = $this->order ?? 0;
        $item->status = $this->status ?? 1;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/gallery', $imageName);
        $item->image = $imageName;
        $item->save();

        session()->flash('success', 'Успешно добавлен!');
        return redirect()->to('/admin/gallery');
    }
}
