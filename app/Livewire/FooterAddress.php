<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class FooterAddress extends Component
{
    public function render()
    {
        $company = Company::find(1)->first();
        return view('livewire.footer-address', compact('company'));
    }
}
