<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm = '';

    public $sortBy = 'created_at';
    public $sortDirection = 'DESC';
    public $sortIcon = '<i class="bx bx-sort-down ml-1"></i>';

    public $delId;

    public function render()
    {
        if (strlen($this->searchTerm) >= 3) {
            $users = User:: where('name','LIKE','%'. $this->searchTerm .'%')
            ->orWhere('email','LIKE','%'. $this->searchTerm .'%')
            ->orderBy($this->sortBy, $this->sortDirection)->paginate(5);
        } else {
            $users = User::orderBy($this->sortBy, $this->sortDirection)->paginate(8);
        }

        return view('livewire.admin.user.user-index-component', compact('users'))
            ->layout('components.layouts.admin-app');
    }

    public function sortField($fieldName)
    {
        $this->sortBy = $fieldName;
        if($this->sortDirection == 'DESC')
        {
            $this->sortDirection = 'ASC';
            $this->sortIcon = '<i class="bx bx-sort-up ml-1"></i>';
        } else
        {
            $this->sortDirection = 'DESC';
            $this->sortIcon = '<i class="bx bx-sort-down ml-1"></i>';
        }
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
