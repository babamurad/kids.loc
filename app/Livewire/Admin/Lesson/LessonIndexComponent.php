<?php

namespace App\Livewire\Admin\Lesson;

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LessonIndexComponent extends Component
{
    use WithPagination;
    public $teacherId;

    public function render()
    {
        $lessons = $this->teacherId ? Auth::user()->teacher->lessons()->paginate(10) : collect();

        return view('livewire.admin.lesson.lesson-index-component', compact('lessons'))
            ->layout('components.layouts.admin-app');
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user->teacher) {
            $this->teacherId = $user->teacher->id;
        } else {
            $this->teacherId = null;
        }
    }

}
