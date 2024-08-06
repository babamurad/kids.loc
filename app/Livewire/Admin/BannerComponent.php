<?php

namespace App\Livewire\Admin;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerComponent extends Component
{
    use WithFileUploads;
    public $EditId;

    public $eCat, $eTeach, $eLess, $eGall;
    public $banners = [];

    public function render()
    {
        $items = Banner::all();

        return view('livewire.admin.banner-component', compact('items'))
            ->layout('components.layouts.admin-app');
    }

    public function mount()
    {

    }

    public function isEdit($id)
    {
        $this->EditId = $id;
    }

}
