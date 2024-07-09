<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\Teacher;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleEditComponent extends Component
{
    use WithFileUploads;
    #[Validate('required|min:3')]
    public string $title;
    #[Validate('required|min:20')]
    public string $content;
    #[Validate('required|image|max:1024')]
    public $image;
    
    public $newImage;
    #[Validate('numeric')]
    public int $order = 0;
    #[Validate('required')]
    public bool $published = false;
    public $publish_date;
    public $author;
    public $editId;
    
    public function render()
    {
        $teachers = Teacher::all();
        return view('livewire.admin.article.article-edit-component', compact('teachers'))
            ->layout('components.layouts.admin-app');
    }

    public function mount($id)
    {
        $article = Article::findOrFail($id);
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->order = $article->order;
        $this->publish_date = $article->publish_date;
        $this->author = $article->author;
        $this->image = $article->image;
       
    }

    public function update()
    {
        $article = Article::findOrFail($this->editId);
        $article->title = $this->title;
        $article->content = $this->content;
        $article->published = $this->published;
        $article->order = $this->order;
        $article->publish_date = $this->publish_date;
        $article->author = $this->author;
        $article->image = $this->image;

        
    }
}
