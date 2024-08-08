<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreateComponent extends Component
{
    public $name, $order;
//    public $icons = [];
    public $color = [];

    protected $rules = ['name' => 'required|string|min:3'];

    public function render()
    {
        $directory = 'images/categories';
        // Указываем путь к папке, где хранятся SVG файлы
        $directory = public_path('images/categories');

        // Получаем список всех файлов в папке
        $files = array_diff(scandir($directory), ['..', '.']);

        // Фильтруем, чтобы оставить только SVG файлы
        $svgFiles = array_filter($files, function($file) use ($directory) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'svg';
        });

        $icons = $svgFiles;

        return view('livewire.admin.category.category-create-component', compact('icons'))
            ->layout('components.layouts.admin-app');
    }

    public function mount()
    {
//        $directory = 'images/categories';
//        $icons = array_diff(scandir($directory), array('..', '.'));
//        $icons = array_filter($icons, function($file) use ($directory) {
//            return is_file($directory . '/' . $file);
//        });
        //dd($icons);

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
