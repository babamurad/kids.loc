<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class SingleArticleComponent extends Component
{
    public $articleId;    
    public function render()
    {
        $article = Article::findOrFail($this->articleId);
        return view('livewire.article.single-article-component', compact('article'));
    }

    public function mount($id)
    {
        $article = Article::findOrFail($id);
        $this->articleId = $article->id;
    }
}
