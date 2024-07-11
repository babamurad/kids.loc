<?php

use App\Livewire\Admin\About\AboutComponent;
use App\Livewire\Admin\Carousel\CarouselCreateComponent;
use App\Livewire\Admin\Carousel\CarouselEditComponent;
use App\Livewire\Admin\Carousel\CarouselIndexComponent;
use App\Livewire\Admin\Teacher\TeacherViewComponent;
use App\Livewire\Article\ArticlesComponent;
use App\Livewire\Article\SingleArticleComponent;
use App\Livewire\CarouselComponent;
use App\Livewire\User\LogoutComponent;
use App\Livewire\User\UserRagisterComponent;
use App\Livewire\User\UserLoginComponent;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', \App\Livewire\HomeComponent::class)->name('home');
Route::get('about-us', \App\Livewire\AboutUsComponent::class)->name('about-us');
Route::get('teachers', \App\Livewire\TeachersComponent::class)->name('teachers');
Route::get('carousel', CarouselComponent::class)->name('carousel');
Route::get('articles', ArticlesComponent::class)->name('articles');
Route::get('single-article/{id}', SingleArticleComponent::class)->name('single-article');

Route::get('register', UserRagisterComponent::class)->name('register');
Route::get('login', UserLoginComponent::class)->name('login');
Route::get('logout', LogoutComponent::class)->name('logout');

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('dashboard', \App\Livewire\Admin\DashboardComponent::class)->name('admin.dashboard');

    Route::get('teachers', \App\Livewire\Admin\Teacher\TeacherIndexComponent::class)->name('admin.teachers');
    Route::get('teachers/create', \App\Livewire\Admin\Teacher\TeacherCreateComponent::class)->name('admin.teachers.create');
    Route::get('teachers/edit/{id}', \App\Livewire\Admin\Teacher\TeacherEditComponent::class)->name('admin.teachers.edit');
    Route::get('teachers/view/{id}', TeacherViewComponent::class)->name('admin.teachers.view');

    Route::get('about', AboutComponent::class)->name('admin.about.index');

    Route::get('articles', \App\Livewire\Admin\Article\ArticleIndexComponent::class)->name('admin.article.index');
    Route::get('articles/create', \App\Livewire\Admin\Article\ArticleCreateComponent::class)->name('admin.article.create');
    Route::get('articles/edit/{id}', \App\Livewire\Admin\Article\ArticleEditComponent::class)->name('admin.article.edit');

    Route::get('carousel', CarouselIndexComponent::class)->name('admin.carousel');
    Route::get('carousel/create', CarouselCreateComponent::class)->name('admin.carousel.create');
    Route::get('carousel/edit/{id}', CarouselEditComponent::class)->name('admin.carousel.edit');

    Route::get('gallery', \App\Livewire\Admin\Gallery\GalleryIndexComponent::class)->name('admin.gallery');
    Route::get('gallery/create', \App\Livewire\Admin\Gallery\GalleryCreateComponent::class)->name('admin.gallery.create');
    Route::get('gallery/edit/{id}', \App\Livewire\Admin\Gallery\GalleryEditComponent::class)->name('admin.gallery.edit');


});
