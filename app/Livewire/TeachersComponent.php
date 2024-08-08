<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\Teacher;
use Livewire\Component;

class TeachersComponent extends Component
{
    public function render()
    {
        $image = Banner::where('id', 1)->value('image');

        $teachers = Teacher::published()->get();
        return view('livewire.teachers-component', compact('teachers', 'image'));
    }
}
