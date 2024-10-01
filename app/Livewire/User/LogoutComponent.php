<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutComponent extends Component
{
    public function render()
    {
        return view('livewire.user.logout-component');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

         return redirect()->route('login');
//        return $this->redirect('/login');
//        return redirect()->route('admin.admin-lessons');
    }
}
