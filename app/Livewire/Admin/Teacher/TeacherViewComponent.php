<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class TeacherViewComponent extends Component
{
    public string $firstname;
    public string $lastname;
    public string $desc;
    public string $position;

    public $image = '';
    public $newImage;
    public $editId;
    public int $order = 0;
    public bool $published = false;
    public function render()
    {
        return view('livewire.admin.teacher.teacher-view-component')
        ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->editId = $teacher->id;
        $this->firstname = $teacher->firstname;
        $this->lastname = $teacher->lastname;
        $this->desc = $teacher->desc;
        $this->position = $teacher->position;
        $this->order = $teacher->order;
        $this->published = $teacher->published;
        $this->image = $teacher->image;
    }
}
