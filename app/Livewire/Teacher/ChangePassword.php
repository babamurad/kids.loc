<?php

namespace App\Livewire\Teacher;

use Livewire\Component;

class ChangePassword extends Component
{
    public function render()
    {
        return view('livewire.teacher.change-password')
            ->layout('components.layouts.teacher-app');
    }
}
