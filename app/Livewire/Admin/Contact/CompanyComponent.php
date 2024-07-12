<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Company;
use Livewire\Component;

class CompanyComponent extends Component
{
    public $name, $address, $phone, $email;
    public $isEdit = false;
    public $editId;

    public function render()
    {
        return view('livewire.admin.contact.company-component');
    }

    public function edit($id)
    {
        $this->isEdit = !$this->isEdit;
        $this->editId = $id;
    }

    public function update()
    {
        $item = Company::findOrFail($this->editId);
        
    }
}
