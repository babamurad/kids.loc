<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $image = Banner::where('id', 3)->value('image');

        $categories = Category::all();
        $articles = Article::published()->orderBy('order')->paginate(6);
        return view('livewire.article.articles-component', compact('articles', 'categories', 'image'));
    }
}
