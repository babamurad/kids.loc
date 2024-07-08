<?php

use App\Livewire\Admin\About\AboutComponent;
use App\Livewire\Admin\Teacher\TeacherViewComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', \App\Livewire\HomeComponent::class)->name('home');
Route::get('about-us', \App\Livewire\AboutUsComponent::class)->name('about-us');
Route::get('teachers', \App\Livewire\TeachersComponent::class)->name('teachers');

Route::prefix('admin')->group(function(){
    Route::get('dashboard', \App\Livewire\Admin\DashboardComponent::class)->name('admin.dashboard');

    Route::get('teachers', \App\Livewire\Admin\Teacher\TeacherIndexComponent::class)->name('admin.teachers');
    Route::get('teachers/create', \App\Livewire\Admin\Teacher\TeacherCreateComponent::class)->name('admin.teachers.create');
    Route::get('teachers/edit/{id}', \App\Livewire\Admin\Teacher\TeacherEditComponent::class)->name('admin.teachers.edit');
    Route::get('teachers/view/{id}', TeacherViewComponent::class)->name('admin.teachers.view');

    Route::get('about', AboutComponent::class)->name('admin.about.index');
});
