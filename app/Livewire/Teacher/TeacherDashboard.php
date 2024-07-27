<?php

namespace App\Livewire\Teacher;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Teacher;
use Livewire\Component;

class TeacherDashboard extends Component
{
    public $teacherId;
    public function render()
    {
        // Получить учителя с уроками и категориями
        $teacher = Teacher::with(['lessons.category'])->findOrFail($this->teacherId);

        // Общее количество уроков учителя
        $totalLessons = $teacher->lessons->count();

        // Группировка уроков по категориям и подсчет количества уроков в каждой категории
        $lessonsByCategory = $teacher->lessons->groupBy('category.name')->map(function ($lessons) use ($totalLessons) {
            return [
                'count' => $lessons->count(),
                'percentage' => round(($lessons->count() / $totalLessons) * 100, 2)
            ];
        });
        return view('livewire.teacher.teacher-dashboard', compact('teacher','lessonsByCategory'))
            ->layout('components.layouts.teacher-app');
    }

    public function mount()
    {
        $this->teacherId = \Auth::user()->teacher->id;

//
    }
}
