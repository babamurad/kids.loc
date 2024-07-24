<?php

use App\Livewire\Admin\About\AboutComponent;
use App\Livewire\Admin\Carousel\CarouselCreateComponent;
use App\Livewire\Admin\Carousel\CarouselEditComponent;
use App\Livewire\Admin\Carousel\CarouselIndexComponent;
use App\Livewire\Admin\Contact\MessageComponent;
use App\Livewire\Admin\Contact\MessageViewComponent;
use App\Livewire\Admin\Teacher\TeacherViewComponent;
use App\Livewire\Article\ArticlesComponent;
use App\Livewire\Article\SingleArticleComponent;
use App\Livewire\CarouselComponent;
use App\Livewire\GalleryComponent;
use App\Livewire\User\LogoutComponent;
use App\Livewire\User\UserRagisterComponent;
use App\Livewire\User\UserLoginComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomeComponent::class)->name('home');
Route::get('about-us', \App\Livewire\AboutUsComponent::class)->name('about-us');
Route::get('teachers', \App\Livewire\TeachersComponent::class)->name('teachers');
Route::get('carousel', CarouselComponent::class)->name('carousel');
Route::get('articles', ArticlesComponent::class)->name('articles');
Route::get('single-article/{id}', SingleArticleComponent::class)->name('single-article');
Route::get('gallery', GalleryComponent::class)->name('gallery');
Route::get('lessons', \App\Livewire\FrontLessonsComonent::class)->name('lessons');

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

    Route::get('company', \App\Livewire\Admin\Contact\CompanyComponent::class)->name('admin.company');
    Route::get('messages', MessageComponent::class)->name('admin.messages');
    Route::get('message/view/{id}', MessageViewComponent::class)->name('admin.message.view');

    Route::get('users', \App\Livewire\Admin\User\UserIndexComponent::class)->name('admin.users');
    Route::get('users/edit/{id}', \App\Livewire\Admin\User\UserEditComponent::class)->name('admin.users.edit');

    Route::get('categories', \App\Livewire\Admin\Category\CategoryIndexComponent::class)->name('admin.categories');
    Route::get('categories/create', \App\Livewire\Admin\Category\CategoryCreateComponent::class)->name('admin.categories.create');
    Route::get('categories/edit/{id}', \App\Livewire\Admin\Category\CategoryEditComponent::class)->name('admin.categories.edit');

    Route::get('teacher-lessons/{teacherId}', \App\Livewire\Admin\Lesson\LessonIndexComponent::class)->name('admin.teacher-lessons');
    Route::get('teacher-lessons/{teacherId}/create', \App\Livewire\Admin\Lesson\LessonCreateComponent::class)->name('admin.teacher-lessons.create');
    Route::get('teacher-lessons/{teacherId}/edit/{id}', \App\Livewire\Admin\Lesson\LessonEditComponent::class)->name('admin.teacher-lessons.edit');

    Route::get('admin-lessons', \App\Livewire\Admin\Lessons\LessonsIndexComponent::class)->name('admin.admin-lessons');
});
