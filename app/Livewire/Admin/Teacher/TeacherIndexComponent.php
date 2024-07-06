<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $del_id;

    public function render()
    {
        $teachers = Teacher::orderBy('id', 'desc')->paginate(5);
        return view('livewire.admin.teacher.teacher-index-component', compact('teachers'))
            ->layout('components.layouts.admin-app');
    }

    public function deleteId($id)
    {
        $this->del_id = $id;
    }

    public function destroy()
    {
        $teacher = Teacher::findOrFail($this->del_id);
        $this->image = $teacher->image;
        if (file_exists('images/teachers/'.$this->image)){
            unlink('images/teachers/'.$this->image);
        }
        $teacher->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }
}
