<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Lesson;
use Livewire\Component;

class FrontLessonsComonent extends Component
{
    public $limit;
    public function render()
    {
        $image = Banner::where('id', 4)->value('image');
        $categories = Category::all();
        if ($this->limit) {
            $lessons = Lesson::with('category', 'teacher')->status()->orderBy('created_at', 'desc')->limit($this->limit)->get(); //orderBy('order')->
        } else {
            $lessons = Lesson::with('category', 'teacher')->status()->orderBy('created_at', 'desc')->get(); //orderBy('order')->
        }

        return view('livewire.front-lessons-comonent', compact('categories', 'lessons', 'image'));
    }

    public function mount($limit = null)
    {
        $this->limit = $limit;
    }
}
