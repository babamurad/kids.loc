<?php

namespace App\Livewire;

use Livewire\Component;
use Mail;

class ContactComponent extends Component
{
    public $name, $email, $phone, $subject, $text;
    protected $rules = [
        'name' => 'required|string|min:2',
        'email' => 'required|email',
        'text' => 'required|string|min:5',
    ];

    public function render()
    {

        return view('livewire.contact-component');
    }

    public function send()
    {        

        $this->validate();

        $details = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'text' => $this->text,
        ];

        Mail::to('recipient@example.com')->send(new \App\Mail\ContactFormMail($details));

        session()->flash('message', 'Your message has been sent successfully!');

        $this->reset();
    }
}
