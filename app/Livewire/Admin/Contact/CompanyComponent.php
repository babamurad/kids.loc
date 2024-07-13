<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Company;
use Livewire\Component;

class CompanyComponent extends Component
{
    public $ofname, $ofaddress, $ofphone, $ofemail;
    public $maname, $maaddress, $maphone, $maemail;
    public $isEdit = false;
    public $editId;

    public function render()
    {
        return view('livewire.admin.contact.company-component')
            ->layout('components.layouts.admin-app');
    }

    public function mount()
    {
       $ofis = Company::first();
       $this->ofname =$ofis->name;
       $this->ofaddress =$ofis->address;
       $this->ofphone =$ofis->phone;
       $this->ofemail =$ofis->email;

        $manage = Company::where('id', '=', 2)->first();
        $this->maname =$manage->name;
        $this->maaddress =$manage->address;
        $this->maphone =$manage->phone;
        $this->maemail =$manage->email;
    }

    public function updateOffice()
    {
        $ofis = Company::first();
        $ofis->name = $this->ofname;
        $ofis->address = $this->ofaddress;
        $ofis->phone = $this->ofphone;
        $ofis->email = $this->ofemail;
        $ofis->update();
        session()->flash('success', 'Office info Saved.');
    }

    public function updateManage()
    {
        $manage = Company::where('id', '=', 2)->first();
        $manage->name = $this->maname;
        $manage->address = $this->maaddress;
        $manage->phone = $this->maphone;
        $manage->email = $this->maemail;
        $manage->update();
        session()->flash('success', 'Managment info Saved.');
    }
}
