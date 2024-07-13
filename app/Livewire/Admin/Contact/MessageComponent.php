<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class MessageComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $messages = Message::read(false)->orderBy('id','desc')->paginate(5);
        return view('livewire.admin.contact.message-component', compact('messages'))
        ->layout('components.layouts.admin-app');
    }
}
