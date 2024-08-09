<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Color;
use App\Models\Icon;
use Livewire\Component;

class CategoryCreateComponent extends Component
{
    public $name, $order;
    public $icon, $color;
    public $selectedColor;

    protected $rules = ['name' => 'required|string|min:3'];

    public function render()
    {
        $icons = Icon::all();
        $colors = Color::all();
        return view('livewire.admin.category.category-create-component', compact('icons', 'colors'))
            ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $this->validate();
        $category = new Category();
        $category->name = $this->name;
        $category->order = $this->order;
        $category->icon = $this->icon;
        $category->color = $this->selectedColor;
        $category->save();

        session()->flash('success', 'Üstünlikli goöuldy!');
        return $this->redirect('/admin/categories', navigate: true);
    }
}
