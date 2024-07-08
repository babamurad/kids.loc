<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ArticleCreateComponent extends Component
{
    use WithFileUploads;
    #[Validate('required|min:3')]
    public string $title;
    #[Validate('required|min:20')]
    public string $content;
    #[Validate('required|image|max:1024')]
    public string $image;
    #[Validate('numeric')]
    public int $order = 0;
    #[Validate('required')]
    public bool $published = false;
    public $published_date;
    public $author;

    public function render()
    {
        return view('livewire.admin.article.article-create-component')
            ->layout('components.layouts.admin-app');
    }

    public function create()
    {
        $data = $this->validate();

        $article = new Article();
        $article->title = $this->title;
        $article->content = $this->content;
        $article->published = $this->published;
        $article->order = $this->order;
        $article->published_date = $this->published_date;
        $article->author = $this->author;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/articles', $imageName);
        $article->image = $imageName;
        $article->save();

        session()->flash('success', 'Успешно добавлен!');
        return redirect()->to('/admin/articles');

    }
}
