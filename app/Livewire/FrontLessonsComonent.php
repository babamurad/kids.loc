<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Lesson;
use Livewire\Component;

class FrontLessonsComonent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $lessons = Lesson::with('category', 'teacher')->status()->orderBy('order')->get();
        return view('livewire.front-lessons-comonent', compact('categories', 'lessons'));
    }
}
