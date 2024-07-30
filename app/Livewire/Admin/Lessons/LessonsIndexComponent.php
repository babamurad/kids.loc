<?php

namespace App\Livewire\Admin\Lessons;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class LessonsIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $teacherId, $teacherName;
    public $categoryId, $categoryName;
    public $perPage = 5;
    public $sort = 'DESC';
    public $search = '';
    public $delId;

    public function render()
    {
        $categories = Category::all();
        $teachers = Teacher::all();

        $lessonsQuery = Lesson::query()->with(['category', 'teacher']);

        if ($this->teacherId) {
            $lessonsQuery->where('teacher_id', $this->teacherId);
        }

        if ($this->categoryId) {
            $lessonsQuery->where('category_id', $this->categoryId);
        }

        if (strlen($this->search) >= 3) {
            $lessonsQuery->where('title', 'like', '%' . $this->search . '%');
        }

        $lessons = $lessonsQuery->orderBy('id', $this->sort)->paginate($this->perPage);

        return view('livewire.admin.lessons.lessons-index-component', compact('lessons', 'teachers', 'categories'))
            ->layout('components.layouts.admin-app');
    }

    public function mount()
    {
        $this->teacherId = session()->get('teacherId', default: '');
        $this->teacherName = session()->get('teacherName', default: '');

        $this->categoryId = session()->get('categoryId', default: '');
        $this->categoryName = session()->get('categoryName', default: '');

        $this->perPage = session()->get('perPage', default: 5);
    }

    public function updatedTeacherId()
    {
        if ($this->teacherId == 0) {
            // Очистка значения из сессии
            session()->forget('teacherId');
            session()->forget('teacherName');
        } else {
            session()->put('teacherId', $this->teacherId);
            $teacher = Teacher::where('id', '=', $this->teacherId)->first();
            if ($teacher) {
                $this->teacherName = $teacher->firstname . ' ' . $teacher->lastname;
                session()->put('teacherName', $this->teacherName);
            }
        }
    }

    public function updatedCategoryId()
    {
        if ($this->categoryId == 0) {
            session()->forget('categoryId');
            session()->forget('categoryName');
        } else {
            session()->put('categoryId', $this->categoryId);
            $category = Category::where('id', '=', $this->categoryId)->first();
            if ($category)
            {
                $this->categoryName = $category->name;
                session()->put('categoryName', $this->categoryName);
            }
        }


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
