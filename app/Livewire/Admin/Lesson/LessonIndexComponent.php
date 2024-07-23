<?php

namespace App\Livewire\Admin\Lesson;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LessonIndexComponent extends Component
{
    use WithPagination;
    public $teacherId;
    public $lessons;

    public function render()
    {
        $teacher = Teacher::find($this->teacherId);
//        dd($teacher);
//        $lessons = $teacher ? $teacher->lessons->paginate(10) : collect();
        $lessons = Auth::user()->teacher->lessons()->paginate(10);
        dd(auth()->user()->teacher->lessons()->title);
        return view('livewire.admin.lesson.lesson-index-component', compact('lessons'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($teacherId)
    {
        $this->teacherId = $teacherId;
    }

}
