<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Banner;
use App\Models\Company;
use Livewire\Component;

class AboutUsComponent extends Component
{
    public $name, $email, $phone, $subject, $text;
    public $res;
    public $blet;
    protected $rules = [
        'name' => 'required|string|min:2',
        'email' => 'required|email',
        'text' => 'required|string|min:5',
    ];

    public function render()
    {
        $companies = Company::all();
        $about = About::first();
        $image = Banner::findOrFail(5);
        return view('livewire.about-us-component', compact('about', 'companies', 'image'));
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
            $this->reset('name', 'email', 'phone', 'subject', 'text');
            session()->flash('success', 'Siziň hatynyz üstunlikli ugradyldy.');
        } else {
            $this->res = 'Siziň hatynyz ugradylmady.';
            session()->flash('error', $this->res);
        }

    }
}
