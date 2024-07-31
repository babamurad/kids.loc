<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Lesson;
use Livewire\Component;

class FrontLessonsComonent extends Component
{
    public $limit;
    public function render()
    {
        $categories = Category::all();
        if ($this->limit) {
            $lessons = Lesson::with('category', 'teacher')->status()->orderBy('order')->limit($this->limit)->get();
        } else {
            $lessons = Lesson::with('category', 'teacher')->status()->orderBy('order')->get();
        }

        return view('livewire.front-lessons-comonent', compact('categories', 'lessons'));
    }

    public function mount($limit = null)
    {
        $this->limit = $limit;
    }
}
