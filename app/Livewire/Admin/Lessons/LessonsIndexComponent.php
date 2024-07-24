<?php

namespace App\Livewire\Admin\Lessons;

use App\Models\Lesson;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class LessonsIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $lessons = Lesson::with('category')->with('teacher')->paginate(10);
        return view('livewire.admin.lessons.lessons-index-component', compact('lessons'))
            ->layout('components.layouts.admin-app');
    }
}
