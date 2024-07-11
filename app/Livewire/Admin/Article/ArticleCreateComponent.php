<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Livewire\Attributes\Validate;

class ArticleCreateComponent extends Component
{
    use WithFileUploads;
    #[Validate('required|min:3')]
    public string $title;
    #[Validate('required|min:20')]
    public string $content;
    #[Validate('required|image|max:1024')]
    public $image;

    #[Validate('numeric')]
    public int $order = 0;
    #[Validate('required')]
    public bool $published = false;
    public $publish_date;
    public $author;

    public function render()
    {
        $teachers = Teacher::all();
        return view('livewire.admin.article.article-create-component', compact('teachers'))
            ->layout('components.layouts.admin-app');
    }

    public function mount()
    {
        $this->publish_date =  Carbon::create(now())->format('d.m.Y');
        $this->image = '';
    }

    public function create()
    {
        $data = $this->validate();

        $article = new Article();
        $article->title = $this->title;
        $article->content = $this->content;
        $article->published = $this->published;
        $article->order = $this->order;
        $article->publish_date = $this->publish_date? Carbon::create($this->publish_date)->format('Y-m-d') : Carbon::create(now())->format('Y-m-d');
        $article->author = $this->author;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/articles', $imageName);
        $article->image = $imageName;
        $article->save();

        session()->flash('success', 'Успешно добавлен!');
        return redirect()->to('/admin/articles');

    }
}
