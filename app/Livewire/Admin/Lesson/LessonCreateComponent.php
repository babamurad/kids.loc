<?php

namespace App\Livewire\Admin\Lesson;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonCreateComponent extends Component
{
    use WithFileUploads;
    public $title, $content, $image, $video, $status, $order, $until_date, $available, $category_id, $teacher_id;

    protected $rules = [
      'title' => 'required|string|min:5',
      'content' => 'required|min:50',
      'available' => 'required',
      'category_id' => 'required|integer',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.lesson.lesson-create-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }
}
