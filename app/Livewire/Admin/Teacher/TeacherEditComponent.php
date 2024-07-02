<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherEditComponent extends Component
{
    use WithFileUploads;
    #[Validate('required|min:3')]
    public string $firstname;
    #[Validate('required|min:3')]
    public string $lastname;
    public string $desc;

    #[Validate('required')]
    public string $position;

    public $image = '';
    public $newImage;
    public $editId;

    #[Validate('numeric')]
    public int $order = 0;
    #[Validate('required')]
    public bool $published = false;

    public function render()
    {
        return view('livewire.admin.teacher.teacher-edit-component')
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->editId = $teacher->id;
        $this->firstname = $teacher->firstname;
        $this->lastname = $teacher->lastname;
        $this->desc = $teacher->desc;
        $this->position = $teacher->position;
        $this->order = $teacher->order;
        $this->published = $teacher->published;
        $this->image = $teacher->image;
    }

    public function update()
    {
        $teacher = Teacher::findOrFail($this->editId);
        $teacher->firstname = $this->firstname;
        $teacher->lastname = $this->lastname;
        $teacher->desc = $this->desc;
        $teacher->position = $this->position;
        $teacher->order = $this->order;
        $teacher->published = $this->published;
        if ($this->newImage){
            if (file_exists('teachers/'.$this->image)){
                unlink('teachers/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('teachers/', $imageName);
            $teacher->image = $imageName;
        }
        $teacher->update();

        $this->resetInputFields();
        session()->flash('success', 'Teachers data updated!');
        return redirect()->to('/admin/teachers');
    }

    public function resetInputFields()
    {
        $this->editId = '';
        $this->firstname = '';
        $this->lastname = '';
        $this->desc = '';
        $this->position = '';
        $this->order = 0;
        $this->published = false;
        $this->image = '';
    }
}
