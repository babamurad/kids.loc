<?php

namespace App\Livewire\Admin\User;

use App\Models\Teacher;
use App\Models\User;
use Livewire\Component;

class UserEditComponent extends Component
{
    public $name, $email, $type, $editId;
    public $teacherId;

    public function render()
    {
        if ($this->type == 'TCH')
        {
            $teachers = Teacher::all();
        } else {
            $teachers = null;
        }

        return view('livewire.admin.user.user-edit-component', compact('teachers'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->editId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->type = $user->type;
    }

    public function update()
    {
        $user = User::findOrFail($this->editId);
        $user->type = $this->type;
        $user->update();
        if ($this->teacherId){
            $teacher = Teacher::findOrFail($this->teacherId);
            $teacher->user_id = $this->editId;
            $teacher->update();
        }

        $this->dispatch('redirect');
//        $this->dispatch('redirect', 'admin.users');
        session()->flash('success', 'User data updated!');
//        return $this->redirect('admin/users', navigate:true);
        return redirect()->route('admin.users');
    }
}
