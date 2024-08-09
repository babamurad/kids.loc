<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Color;
use App\Models\Icon;
use Livewire\Component;

class CategoryEditComponent extends Component
{
    public $name, $order, $editId;
    public $icon, $color;
    public $selectedColor;

    protected $rules = ['name' => 'required|string|min:3'];

    public function render()
    {
        $icons = Icon::all();
        $colors = Color::all();
        return view('livewire.admin.category.category-edit-component', compact('icons', 'colors'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->editId = $category->id;
        $this->name = $category->name;
        $this->order = $category->order;
        $this->icon = $category->icon;
        $this->selectedColor = $category->color;
        $this->color = $category->color;
    }

    public function update()
    {
        $this->validate();
        $category = Category::findOrFail($this->editId);
        $category->name = $this->name;
        $category->order = $this->order;
        $category->icon = $this->icon;
        $category->color = $this->selectedColor;
        $category->update();

        session()->flash('success', 'Üstünlikli düzedildi!');
        return $this->redirect('/admin/categories', navigate: true);
    }
}
