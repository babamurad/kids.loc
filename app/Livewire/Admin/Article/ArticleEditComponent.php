<?php

namespace App\Livewire\Admin\Article;

use Livewire\Component;

class ArticleEditComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.article.article-edit-component')
            ->layout('components.layouts.admin-app');
    }
}
