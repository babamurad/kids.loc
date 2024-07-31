<?php

namespace App\Livewire\Admin\Lessons;

use App\Models\Category;
use App\Models\Lesson;
use Livewire\Component;

class LessonsViewComponent extends Component
{
    public $viewId;
    public $title, $content, $image, $video, $status, $order, $until_date, $available, $category_id, $teacher_id;
    public $audio, $file;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.lessons.lessons-view-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $this->viewId = $id;
        $lesson = Lesson::findOrFail($this->viewId);
        $this->title = $lesson->title;
        $this->content = $lesson->content;
        $this->image = $lesson->image;
        $this->video = $lesson->video;
        $this->status = $lesson->status;
        $this->order = $lesson->order;
        $this->until_date = $lesson->until_date;
        $this->available = $lesson->available;
        $this->category_id = $lesson->category_id;
        $this->teacher_id = $lesson->teacher_id;
        $this->file = $lesson->file;
        $this->audio = $lesson->audio;
    }

    public function update()
    {
        $lesson = Lesson::findOrFail($this->viewId);
        $lesson->status = $this->status;
        $lesson->order = $this->order;
        $lesson->until_date = $this->until_date;
        $lesson->available = $this->available;
        $lesson->category_id = $this->category_id;

        $lesson->update();
        $this->resetInputFields();
        session()->flash('success', 'Data updated!');
        return redirect()->route('admin.admin-lessons');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = '';
        $this->video = '';
        $this->status = '';
        $this->order = '';
        $this->until_date = '';
        $this->available = '';
        $this->category_id = '';
        $this->teacher_id = '';
    }

    public function removeFile()
    {
        $this->file = null;
    }
}
