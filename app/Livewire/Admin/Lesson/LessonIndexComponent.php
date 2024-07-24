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
    public $delId;
    public $image;
    public $video;

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

    public function deleteId($id)
    {
        $this->delId = $id;
    }

    public function destroy()
    {
        $lesson = Lesson::findOrFail($this->delId);
        $this->image = $lesson->image;
        if (file_exists('images/lesson/images/'.$this->image)){
            unlink('images/lesson/images/'.$this->image);
        }
        $this->video = $lesson->video;
        if (file_exists('images/lesson/video/'.$this->video)){
            unlink('images/lesson/video/'.$this->video);
        }
        $lesson->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }
}
