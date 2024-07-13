<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Company;
use Livewire\Component;

class CompanyComponent extends Component
{
    public $ofname, $ofaddress, $ofphone, $ofemail;
    public $maname, $maaddress, $maphone, $maemail;
    public $EditOffice = false;
    public $EditManage = false;
    
    public $rules = [
        'office' => [
            'ofname' => 'required|min:3|max:255',
            'ofemail' => 'required|email',
            'ofaddress' => 'required|min:3|max:255',
        ],
        'manage' => [
            'maname' => 'required|min:3|max:255',
            'maemail' => 'required|email',
            'maaddress' => 'required|min:3|max:255',
        ],
    ];

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
        $this->validate($this->rules['office']);
        $ofis = Company::first();
        $ofis->name = $this->ofname;
        $ofis->address = $this->ofaddress;
        $ofis->phone = $this->ofphone;
        $ofis->email = $this->ofemail;
        $ofis->update();
        $this->EditOffice = false;
        session()->flash('success', 'Office info Saved.');
    }

    public function updateManage()
    {
        $this->validate($this->rules['manage']);
        $manage = Company::where('id', '=', 2)->first();
        $manage->name = $this->maname;
        $manage->address = $this->maaddress;
        $manage->phone = $this->maphone;
        $manage->email = $this->maemail;
        $manage->update();
        $this->EditManage = false;
        session()->flash('success', 'Managment info Saved.');
    }

    public function CanEditOffice()
    {
        $this->EditOffice = !$this->EditOffice;
    }

    public function CanEditManage()
    {
        $this->EditManage = !$this->EditManage;
    }
}
