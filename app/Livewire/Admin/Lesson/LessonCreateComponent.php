<?php

namespace App\Livewire\Admin\Lesson;

use App\Models\Category;
use App\Models\Lesson;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonCreateComponent extends Component
{
    use WithFileUploads;
    public $title, $content, $image, $video, $status, $order, $until_date, $available, $category_id, $teacher_id;

    protected $rules = [
      'title' => 'required|string|min:5',
      'content' => 'required|min:50',
//      'video' => 'required|mimes:mp4,mov,avi|max:100MB',
      'video' => 'required|mimes:mp4,mov,ogg,qt',//|max:204800
      'available' => 'required',
      'category_id' => 'required|integer',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.lesson.lesson-create-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $lesson = new Lesson();
        $lesson->title = $this->title;
        $lesson->content = $this->content;
        $lesson->status = $this->status;
        $lesson->order = $this->order;
        $lesson->until_date = $this->until_date;
        $lesson->available = $this->available;
        $lesson->category_id = $this->category_id;
        $lesson->teacher_id = 2;//auth()->user()->id;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/lesson/images', $imageName);
        $lesson->image = $imageName;

        $videoName = Carbon::now()->timestamp.'.'.$this->video->extension();
        $this->video->storeAs('/lesson/video', $videoName);
        $lesson->video = $videoName;

        $lesson->save();
        session()->flash('success', 'User data updated!');
        return $this->redirect('admin/lessons');
    }
}
