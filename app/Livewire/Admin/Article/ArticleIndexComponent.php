<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $del_id;
    public $image;

    public function render()
    {
        $articles = Article::paginate();
        return view('livewire.admin.article.article-index-component', compact('articles'))
            ->layout('components.layouts.admin-app');
    }

    public function deleteId($id)
    {
        $this->del_id = $id;
    }

    public function destroy()
    {
        $article = Article::findOrFail($this->del_id);
        $this->image = $article->image;
        if (file_exists('images/teachers/'.$this->image)){
            unlink('images/teachers/'.$this->image);
        }
        $article->delete();

        $this->dispatch('closeModal');
        session()->flash('error', 'Deleted.');
    }

    public function cancel()
    {
        $this->del_id = '';
    }
}
