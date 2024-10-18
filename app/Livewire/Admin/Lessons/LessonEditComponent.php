<?php

namespace App\Livewire\Admin\Lessons;

use App\Models\Category;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonEditComponent extends Component
{
    use WithFileUploads;
    public $title, $content, $image, $video, $audio, $file, $status, $order, $until_date, $available, $category_id, $teacher_id;
    public $newImage, $newVideo, $newAudio, $newFile;
    public $editId;
    public $audioPreviewId;
    public $videoPreviewId;
    public $previewUrl;

    protected $rules = [
        'title' => 'required|string|min:5',
        'content' => 'required|min:50',
        'available' => 'required',
        'category_id' => 'required|integer',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.lessons.lesson-edit-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $this->editId = $id;
        $lesson = Lesson::findOrFail($this->editId);
        $this->title = $lesson->title;
        $this->content = $lesson->content;
        $this->image = $lesson->image;
        $this->video = $lesson->video;
        $this->audio = $lesson->audio;
        $this->file = $lesson->file;
        $this->status = $lesson->status;
        $this->order = $lesson->order;
        $this->until_date = $lesson->until_date;
        $this->available = $lesson->available;
        $this->category_id = $lesson->category_id;
        $this->teacher_id = $lesson->teacher_id;
    }

    public function update()
    {
        $lesson = Lesson::findOrFail($this->editId);
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
        if ($this->newAudio){
            if (file_exists('lesson/audio'.$this->newAudio)){
                unlink('lesson/audio/'.$this->newAudio);
            }
            $audioName = Carbon::now()->timestamp.'.'.$this->newAudio->extension();
            $this->newAudio->storeAs('lesson/audio/', $audioName);
            $lesson->audio = $audioName;
        }
        if ($this->newFile){
            if (file_exists('lesson/files'.$this->newFile)){
                unlink('lesson/files/'.$this->newFile);
            }
            $fileName = $this->newFile->getClientOriginalName();
            $this->newFile->storeAs('lesson/files/', $fileName);
            $lesson->file = $fileName;
        }

        $lesson->update();

        $this->resetInputFields();
        session()->flash('success', 'Sapagyň maglumatlary üstünlikli düzedildi!');
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

    public function removeDocFile()
    {
        $lesson = Lesson::findOrFail($this->editId);
        if (file_exists('lesson/files'.$this->newFile)){
            unlink('lesson/files/'.$this->newFile);
        }
        $lesson->update();
        session()->flash('success', 'Sapaga dedgişli faýl aýryldy!');
    }
}
