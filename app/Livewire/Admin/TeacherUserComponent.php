<?php

namespace App\Livewire\Admin;

use App\Models\Teacher;
use Livewire\Component;

class TeacherUserComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.teacher-user-component');
    }

    public function mount($id)
    {
        $teacher = Teacher::findOrFail($id);

    }
}
