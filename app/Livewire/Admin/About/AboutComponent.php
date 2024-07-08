<?php

namespace App\Livewire\Admin\About;

use App\Models\About;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AboutComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $content;
    public $image;
    public $newImage;

    public function render()
    {
        $about = About::first();
        return view('livewire.admin.about.about-component', compact('about'))
        ->layout('components.layouts.admin-app');
    }

    public function mount()
    {
        $about = About::first();
        $this->title = $about->title;
        $this->content = $about->content;
        $this->image = $about->image;
    }

    public function update()
    {
        //dd('update');
        $about = About::first();
        $about->title = $this->title;
        $about->content = $this->content;
        if ($this->newImage){
            if (file_exists('about/'.$this->image)){
                unlink('about/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('about/', $imageName);
            $about->image = $imageName;
        }
        $about->update();

        $this->resetInputFields();
        session()->flash('success', 'Data updated!');
        return redirect()->to('/admin/about');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = '';
    }
    
}
