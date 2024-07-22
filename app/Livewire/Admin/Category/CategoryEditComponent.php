<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryEditComponent extends Component
{
    public $name, $order, $editId;
    protected $rules = ['name' => 'required|string|min:3'];

    public function render()
    {
        return view('livewire.admin.category.category-edit-component')
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->editId = $category->id;
        $this->name = $category->name;
        $this->order = $category->order;
    }

    public function update()
    {
        $category = Category::findOrFail($this->editId);
        $category->name = $this->name;
        $category->order = $this->order;
        $category->update();

        session()->flash('success', 'Успешно изменен!');
        return $this->redirect('/admin/categories', navigate: true);
    }
}
