<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Message;
use Livewire\Component;
use Mail;

class ContactComponent extends Component
{
    public $name, $email, $phone, $subject, $text;

    protected $rules = [
        'name' => 'required|string|min:2',
        'email' => 'required|email',
        'text' => 'required|string|min:5',
        'subject' => 'required|string|min:2',
    ];

    public function render()
    {
        $companies = Company::all();
        return view('livewire.contact-component', compact('companies'));
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

    public function mailSend()
    {
        $this->validate();
        $to = 'korpe@korpe.com';
        // HTML email message
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Contact Form Message</title>
        </head>
        <body>
            <h1>Contact Form Message</h1>
            <p>Name:'  . $this->name . '</p>
            <p>Email:'  . $this->email . '</p>
            <p>Phone:'  . $this->phone . '</p>
            <p>Subject:'  . $this->subject . '</p>
            <p>Message:'  . $this->text . '</p>
        </body>
        </html>';

        // Headers for the email
        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: $this->email\r\n";

        // Sending the email
        if (mail($to, $this->subject, $message, $headers)) {
            $msg = new Message();
            $msg->name = $this->name;
            $msg->email = $this->email;
            $msg->phone = $this->phone;
            $msg->subject = $this->subject;
            $msg->text = $this->text;
            $msg->save();
            $this->reset('name', 'email', 'phone', 'subject', 'text');
            session()->flash('success', 'Siziň hatynyz üstunlikli ugradyldy.');
        } else {
            session()->flash('error', 'Siziň hatynyz ugradylmady.');
        }
    }

    public function closeAlert()
    {
        $this->dispatch('alert-hidden');
    }

    public function CloseErrorAlert()
    {
        $this->dispatch('error-alert-hidden');
    }

}
