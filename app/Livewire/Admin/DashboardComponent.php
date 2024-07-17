<?php

namespace App\Livewire\Admin;

use Cassandra\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $name, $email;
    public $currentPassword;
    public $password;
    public $password_confirmation;

    protected $rules = ([
        'currentPassword' => 'required|min:6',
        'password' => 'required|min:6|confirmed',
    ]);

    public function render()
    {
        return view('livewire.admin.dashboard-component')
            ->layout('components.layouts.admin-app');
    }

    public function resetPassword()
    {
//        $this->validate();

//        // Use Auth::user() to get the current user
//        $user = Auth::user();
//
//        if (Hash::check($this->currentPassword, $user->password)) {
//            $user->password = Hash::make($this->newPassword);
//            $user->save();
//
//            session()->flash('success', 'Ваш пароль успешно изменен!');
//            // Optionally, redirect the user to a login page
//        } else {
//            session()->flash('success', 'екущий пароль введен неправильно.');
//        }

        //****
        try {
            $this->validate([
                'currentPassword' => 'required|min:6',
                'password' => 'required|min:6|confirmed',
            ]);

            Auth::user()->update([
                'password' => Hash::make($this->password),
            ]);

            session()->flash('success', 'Ваш пароль успешно изменен!');
            //$this->resetForm();
        } catch (ValidationException $e) {
            session()->flash('error', 'Текущий пароль введен неправильно.');
        }
    }
}
