<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\Message;
use Livewire\Component;

class SingleArticleComponent extends Component
{
    public $articleId;
    public $name, $email, $text;
    public $SendMessage = false;

    public function render()
    {
        $articles = Article::inRandomOrder()->take(3)->get();
        $article = Article::findOrFail($this->articleId);
        return view('livewire.article.single-article-component', compact('article', 'articles'));
    }

    public function mount($id)
    {
        $article = Article::findOrFail($id);
        $this->articleId = $article->id;
    }

    public function SendQuestion()
    {
        //
        $msg = new Message();
        $msg->name = $this->name;
        $msg->email = $this->email;
        $msg->text = $this->text;
        $msg->subject = 'Makala sahypasyndan gelen sorag';
        $msg->save();

        $this->SendMessage = true;

        $this->reset('name', 'email', 'text');
    }
}
