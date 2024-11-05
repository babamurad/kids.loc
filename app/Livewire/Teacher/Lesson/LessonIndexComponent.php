<?php

namespace App\Livewire\Teacher\Lesson;

use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LessonIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 4;
    public $teacherId;
    public $delId;
    public $image;
    public $video;

    public function render()
    {
        $lessons = $this->teacherId ? Auth::user()->teacher->lessons()->with('category')->orderBy('id', 'desc')->paginate($this->perPage) : collect(); //->orderBy('order')

        return view('livewire.teacher.lesson.lesson-index-component', compact('lessons'))
            ->layout('components.layouts.teacher-app');
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user->teacher) {
            $this->teacherId = $user->teacher->id;
        } else {
            $this->teacherId = null;
        }
        $this->perPage = session()->get('perPage', default: 5);
    }

    public function updatedPerPage()
    {
        session()->put('perPage', $this->perPage);
    }

    public function deleteId($id)
    {
        $this->delId = $id;
    }

    public function destroy()
    {
        $lesson = Lesson::findOrFail($this->delId);
        $this->image = $lesson->image;
        if (file_exists('images/lesson/images/'.$this->image) && $this->image){
            unlink('images/lesson/images/'.$this->image);
        }
        $this->video = $lesson->video;

        if (file_exists('images/lesson/video/'.$this->video) && ($this->video)){
            unlink('images/lesson/video/'.$this->video);
        }
        $lesson->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }
}
