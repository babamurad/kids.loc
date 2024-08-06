<?php

namespace App\Livewire\Admin;

use App\Models\Banner;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerComponent extends Component
{
    use WithFileUploads;
    public $EditId;
    public $newImage = '';
    public $image = '';
    public $title;
    public $bannerEdit = false;

    public function render()
    {
        $items = Banner::all();

        return view('livewire.admin.banner-component', compact('items'))
            ->layout('components.layouts.admin-app');
    }

    public function isEdit($id)
    {
        $this->EditId = '';
        $this->EditId = $id;
        $item = Banner::findOrFail($this->EditId);
        //dd($this->EditId);
        $this->title = $item->title;
        $this->image = $item->image;

        $this->bannerEdit = true;
    }

    public function update()
    {
        $banner = Banner::findOrFail($this->EditId);
        if ($this->newImage){
            if (file_exists('banners/'.$this->image)){
                unlink('banners/'.$this->image);
            }
            $imageName = $this->newImage->getClientOriginalName();
            $this->newImage->storeAs('banners/', $imageName);
            $banner->image = $imageName;
        }

        $banner->update();
        $this->EditId = '';
        $this->image = '';
        $this->bannerEdit = false;
        session()->flash('success', 'Saved.');
    }

}
