<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $delId;

    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.admin.user.user-index-component', compact('users'))
            ->layout('components.layouts.admin-app');
    }

    public function deleteId($id)
    {
        $this->delId = $id;
    }

    public function destroy()
    {
        $user = User::findOrFail($this->delId);

        $user->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }
}
