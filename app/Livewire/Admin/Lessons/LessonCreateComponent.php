<?php

namespace App\Livewire\Admin\Lessons;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonCreateComponent extends Component
{
    use WithFileUploads;
    public $title, $content, $image, $video, $audio, $file, $status, $order, $until_date, $available, $category_id, $teacher_id;
    public $audioPreviewId;
    public $videoPreviewId;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.lessons.lesson-create-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }
}
