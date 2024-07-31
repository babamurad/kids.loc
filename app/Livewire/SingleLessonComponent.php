<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class SingleLessonComponent extends Component
{
    public $title, $content, $image, $video, $created_at;
    public $FirstName, $LastName, $position;
    public $audio, $file;

    public function render()
    {
        return view('livewire.single-lesson-component');
    }

    public function mount($id)
    {
        $lesson = Lesson::with('teacher')->findOrFail($id);
        $this->title = $lesson->title;
        $this->image = $lesson->image;
        $this->video = $lesson->video;
        $this->content = $lesson->content;
        $this->created_at = $lesson->created_at;
        $this->audio = $lesson->audio;
        $this->file = $lesson->file;

//        $teacher = \Auth::user()->teacher;
        $this->FirstName = $lesson->teacher->firstname;
        $this->LastName = $lesson->teacher->lastname;
        $this->position = $lesson->teacher->position;

    }
}
