<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherCreateComponent extends Component
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

    #[Validate('numeric')]
    public int $order = 0;
    #[Validate('required')]
    public bool $published = false;

    public function render()
    {
        return view('livewire.admin.teacher.teacher-create-component')
            ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $data = $this->validate();

        $teacher = new Teacher();
        $teacher->firstname = $this->firstname;
        $teacher->lastname = $this->lastname;
        $teacher->desc = $this->desc;
        $teacher->position = $this->position;
        $teacher->order = $this->order;
        $teacher->published = $this->published;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/teachers', $imageName);
        $teacher->image = $imageName;
        $teacher->save();

        session()->flash('success', 'Успешно добавлен!');
        return redirect()->to('/admin/teachers');

    }
}
