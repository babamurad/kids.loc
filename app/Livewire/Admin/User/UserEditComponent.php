<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class UserEditComponent extends Component
{

    public $name, $email, $type, $editId;
    public function render()
    {
        return view('livewire.admin.user.user-edit-component')
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
        $this->dispatch('redirect');
//        $this->dispatch('redirect', 'admin.users');
        session()->flash('success', 'User data updated!');
//        return $this->redirect('admin/users', navigate:true);
    }
}
