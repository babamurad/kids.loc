<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $name, $email;
    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirmation;
    protected $rules = ([
    'currentPassword' => 'required|min:6',
    'newPassword' => 'required|min:6|confirmed',
    'newPasswordConfirmation' => 'required|min:6',
    ]);

    public function render()
    {
        return view('livewire.user.profile')
        ->layout('components.layouts.admin-app');
    }

    public function resetPassword()
    {
        $this->validateForm();

        // Use Auth::user() to get the current user
        $user = Auth::user();

        if (Hash::check($this->currentPassword, $user->password)) {
            $user->password = Hash::make($this->newPassword);
            $user->save();

            session()->flash('success', 'Ваш пароль успешно изменен!');
            // Optionally, redirect the user to a login page
        } else {
            session()->flash('success', 'екущий пароль введен неправильно.');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        // return redirect()->route('/');
        return $this->redirect('/login', navigate:true);
    }
}