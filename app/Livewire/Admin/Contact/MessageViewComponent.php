<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Message;
use Livewire\Component;

class MessageViewComponent extends Component
{
    public $name, $email, $phone, $subject, $text;
    public $read, $editId;

    public function render()
    {
        return view('livewire.admin.contact.message-view-component')
        ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $message = Message::findOrFail($id);
        $this->editId = $message->id;
        $this->name = $message->name;
        $this->email = $message->email;
        $this->phone = $message->phone;
        $this->subject = $message->subject;
        $this->text = $message->text;
        $this->read = $message->read;
    }

    public function readUpdate()
    {
        $message = Message::findOrFail($this->editId);
        $message->read = $this->read ? 1:0;
        $message->update();
    }
}
