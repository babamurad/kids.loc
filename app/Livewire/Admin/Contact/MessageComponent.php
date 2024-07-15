<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class MessageComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $del_id;

    public function render()
    {
//        $messages = Message::read(false)->orderBy('id','desc')->paginate(5);
        $messages = Message::orderBy('id','desc')->paginate(5);
        return view('livewire.admin.contact.message-component', compact('messages'))
        ->layout('components.layouts.admin-app');
    }

    public function PubUnPub($id)
    {
        $message = Message::findOrFail($id);
        $message->read = !$message->read;
        $message->update();
    }

    public function deleteId($id)
    {
        $this->del_id = $id;
    }

    public function destroy()
    {
        session()->forget('error');
        $message = Message::findOrFail($this->del_id);
        $message->delete();

        session()->flash('error', 'Удалено');

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }

    public function closeAlert()
    {
        $this->dispatch('alert-hidden');
    }
}
