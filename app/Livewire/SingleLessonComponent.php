<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class SingleLessonComponent extends Component
{
    public $title, $content, $image, $video, $created_at;
    public function render()
    {

        return view('livewire.single-lesson-component');
    }

    public function mount($id)
    {
        $lesson = Lesson::findOrFail($id);
        $this->title = $lesson->title;
        $this->image = $lesson->image;
        $this->video = $lesson->video;
        $this->content = $lesson->content;
        $this->created_at = $lesson->created_at;
    }
}
