<?php

namespace App\Livewire\Admin\Lesson;

use App\Models\Category;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonEditComponent extends Component
{
    use WithFileUploads;
    public $idl, $teacherId;
    public $title, $content, $image, $video, $status, $order, $until_date, $available, $category_id, $teacher_id;
    public $newImage, $newVideo;

    protected $rules = [
        'title' => 'required|string|min:5',
        'content' => 'required|min:50',
        'available' => 'required',
        'category_id' => 'required|integer',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.lesson.lesson-edit-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($id, $teacherId)
    {
        $this->idl = $id;
        $this->teacherId = $teacherId;
        $lesson = $this->teacherId ? Auth::user()->teacher->lessons()->where('id', $this->idl)->first() : collect();
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
    }

    public function changeVideo()
    {
        if ($this->newVideo)
        {
            if (file_exists($this->newVideo->getClientOriginalName()))
            {
                unlink($this->newVideo->getClientOriginalName());
                $this->newVideo = null;
                dd('newVideoClick');
            } else {
                $this->newVideo = null;
                dd('newVideoClick newVideo = null');
            }
        }
    }

    public function update()
    {
        $lesson = $this->teacherId ? Auth::user()->teacher->lessons()->where('id', $this->idl)->first() : collect();
        $lesson->title = $this->title;
        $lesson->content = $this->content;
        $lesson->image = $this->image;
        $lesson->video = $this->video;
        $lesson->status = $this->status;
        $lesson->order = $this->order;
        $lesson->until_date = $this->until_date;
        $lesson->available = $this->available;
        $lesson->category_id = $this->category_id;
        $lesson->teacher_id = $this->teacher_id;

        if ($this->newImage){
            if (file_exists('lesson/images'.$this->image)){
                unlink('lesson/images/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('lesson/images/', $imageName);
            $lesson->image = $imageName;
        }

        if ($this->newVideo){
            if (file_exists('lesson/video'.$this->newVideo)){
                unlink('lesson/video/'.$this->newVideo);
            }
            $videoName = Carbon::now()->timestamp.'.'.$this->newVideo->extension();
            $this->newVideo->storeAs('lesson/video/', $videoName);
            $lesson->video = $videoName;
        }

        $lesson->update();

        $this->resetInputFields();
        session()->flash('success', 'Data updated!');
        return redirect()->route('admin.teacher-lessons', ['id' => $this->idl, 'teacherId' => $this->teacherId]);
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

}
