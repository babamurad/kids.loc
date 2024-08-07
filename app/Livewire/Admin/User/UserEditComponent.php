<?php

namespace App\Livewire\Admin\User;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEditComponent extends Component
{
    public $name, $email, $type, $editId;
    public $teacherId;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ];

    protected $messages = [
        'name.required' => 'Имя обязательно для заполнения.',
        'name.string' => 'Имя должно быть строкой.',
        'name.max' => 'Имя не должно превышать 255 символов.',
        'email.required' => 'Email обязателен для заполнения.',
        'email.email' => 'Введите корректный Email адрес.',
        'email.unique' => 'Этот Email уже используется.',
        'password.required' => 'Пароль обязателен для заполнения.',
        'password.min' => 'Пароль должен содержать не менее 6 символов.',
        'password.confirmed' => 'Пароли не совпадают.',
    ];

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
        if ($user->teacher) {
            $this->teacherId = $user->teacher->id;
        }

    }

    public function update()
    {
        $user = User::findOrFail($this->editId);
        $user->type = $this->type;
        $user->password = Hash::make($this->password);
        $user->update();
        if ($this->teacherId){
            $teacher = Teacher::findOrFail($this->teacherId);
            $teacher->user_id = $this->editId;
            $teacher->update();
        }

        $this->dispatch('redirect');
        session()->flash('success', 'User data updated!');

        return redirect()->route('admin.users');
    }
}
