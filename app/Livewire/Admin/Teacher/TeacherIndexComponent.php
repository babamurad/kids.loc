<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm = '';

    public $sortBy = 'created_at';
    public $sortDirection = 'DESC';
    public $sortIcon = '<i class="bx bx-sort-up ml-1"></i>';

    public $del_id;
    public $image;

    public function render()
    {
        $teachers = Teacher::query();
        if (strlen($this->searchTerm) >= 3) {
            $teachers->where('firstname', 'like', "%{$this->searchTerm}%")
            ->orWhere('lastname', 'like', "%{$this->searchTerm}%");
        }
        $teachers->orderBy($this->sortBy, $this->sortDirection);
        $teachers = $teachers->paginate(5);
        return view('livewire.admin.teacher.teacher-index-component', compact('teachers'))
            ->layout('components.layouts.admin-app');
    }

    public function sortField($fieldName)
    {
        $this->sortBy = $fieldName;
        if($this->sortDirection == 'DESC')
        {
            $this->sortDirection = 'ASC';
            $this->sortIcon = '<i class="bx bx-sort-up ml-1"></i>';
        } else
        {
            $this->sortDirection = 'DESC';
            $this->sortIcon = '<i class="bx bx-sort-down ml-1"></i>';
        }
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

    public function cancel()
    {
        $this->del_id = '';
    }
}
