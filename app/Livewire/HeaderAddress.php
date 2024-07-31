<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class HeaderAddress extends Component
{
    public function render()
    {
        $company = Company::first();
        return view('livewire.header-address', compact('company'));
    }
}
