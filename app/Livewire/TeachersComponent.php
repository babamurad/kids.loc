<?php

namespace App\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class TeachersComponent extends Component
{
    public function render()
    {
        $teachers = Teacher::published()->get();
        return view('livewire.teachers-component', compact('teachers'));
    }
}
