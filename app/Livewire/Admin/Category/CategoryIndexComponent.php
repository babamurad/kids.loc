<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryIndexComponent extends Component
{
    public $delId;
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.category-index-component', compact('categories'))
            ->layout('components.layouts.admin-app');
    }

    public function deleteId($id)
    {
        $category = Category::findOrFail($id);
        $this->delId = $category->id;
    }

    public function destroy()
    {
        $category = Category::findOrFail($this->delId);
        $category->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }
}