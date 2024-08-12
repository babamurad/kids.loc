<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Teacher;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {

        $teachers = Teacher::published()->orderBy('order')->get();
        $about = About::first();
        $carousel = Carousel::status()->orderBy('order')->get();
        $articles = Article::published()->orderBy('order')->limit(4)->get();
        $categories = Category::all();

        return view('livewire.home-component',compact('teachers', 'about', 'carousel', 'articles', 'categories'));
    }
}
