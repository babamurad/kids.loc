<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreateComponent extends Component
{
    public $name, $order;

    protected $rules = ['name' => 'required|string|min:3'];

    public function render()
    {
        return view('livewire.admin.category.category-create-component')
            ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $this->validate();
        $category = new Category();
        $category->name = $this->name;
        $category->order = $this->order;
        $category->save();

        session()->flash('success', 'Успешно добавлен!');
        return $this->redirect('/admin/categories', navigate: true);
    }
}
