<?php

namespace App\Livewire\Teacher\Lesson;

use App\Models\Category;
use App\Models\Lesson;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonCreateComponent extends Component
{
    use WithFileUploads;
    public $title, $content, $image, $video, $audio, $file, $status, $order, $until_date, $available, $category_id, $teacher_id;
    public $audioPreviewId;
    public $videoPreviewId;
    public $previewUrl;

    protected $rules = [
      'title' => 'required|string|min:5',
      'content' => 'required|min:50',
//      'video' => 'required|mimes:mp4,mov,avi|max:100MB',
    //   'video' => 'required|mimes:mp4,mov,ogg,qt',//|max:204800
//      'file' => 'required|mimes:pdf,ppt,pptx,doc,docx|max:12288',
//      'audio' => 'required|mimes:mp3,wav,ogg|max:12288', // 12MB max size
//      'available' => 'required',
      'category_id' => 'required|integer',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.teacher.lesson.lesson-create-component', compact('categories'))
            ->layout('components.layouts.teacher-app');
    }

    public function mount()
    {
        $this->audioPreviewId = uniqid();
        $this->videoPreviewId = uniqid();
    }

    public function create()
    {
        $this->validate();

        $lesson = new Lesson();
        $lesson->title = $this->title;
        $lesson->content = $this->content;
        $lesson->status = $this->status;
        $lesson->order = $this->order ?? 0;
        $lesson->until_date = $this->until_date ?? now();
        $lesson->available = $this->available ?? 1;
        $lesson->category_id = $this->category_id;
        $lesson->teacher_id = auth()->user()->teacher->id;

        if($this->image) {
//            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $imageName = $this->image->getClientOriginalName();
            $this->image->storeAs('/lesson/images', $imageName);
            $lesson->image = $imageName;
        }

        if($this->video) {
//            $videoName = Carbon::now()->timestamp.'.'.$this->video->extension();
            $videoName = $this->video->getClientOriginalName();
            $this->video->storeAs('/lesson/video', $videoName);
            $lesson->video = $videoName;
        }
        if($this->audio) {
//            $audioName = Carbon::now()->timestamp.'.'.$this->audio->extension();
            $audioName = $this->audio->getClientOriginalName();
            $this->audio->storeAs('/lesson/audio', $audioName);
            $lesson->audio = $audioName;
        }
        if($this->file) {
//            $fileName = Carbon::now()->timestamp.'.'.$this->file->extension();
            $fileName = $this->file->getClientOriginalName();
            $this->file->storeAs('/lesson/files', $fileName);
            $lesson->file = $fileName;
        }

        $lesson->save();
        session()->flash('success', 'User data updated!');
        return redirect()->route('teacher.teacher-lessons', ['teacherId' => auth()->user()->teacher->id]);
    }

    public function updatedFile($newFile)
    {
        // ... валидация и сохранение файла

        // Преобразование в URL для предварительного просмотра (например, используя Office.js)
        $this->previewUrl = 'https://view.officeapps.live.com/op/view.aspx?src=' . urlencode(url(asset('/images/lesson/files'). '/' . $this->file));
    }

    public function updateAudio()
    {
        $this->audio = null;
    }

    public function updatedVideo()
    {
        $this->videoPreviewId = uniqid();
    }

}
