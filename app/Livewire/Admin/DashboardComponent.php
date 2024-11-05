<?php

namespace App\Livewire\Admin;

use App\Models\Teacher;
use Cassandra\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $name, $email;
    public $currentPassword;
    public $password;
    public $password_confirmation;

    protected $rules = ([
        'currentPassword' => 'required|min:6',
        'password' => 'required|min:6|confirmed',
    ]);

    public function render()
    {
        $teachers = Teacher::take(8)->get();
//        $items = DB::select('CALL GetRecordCounts()');
        $items = DB::select("
    SELECT
        'Kategoriýalar' AS tablename,
        COUNT(*) AS record_count
    FROM categories
    UNION ALL
    SELECT
        'Sapaklar' AS tablename,
        COUNT(*) AS record_count
    FROM lessons
    UNION ALL
    SELECT
        'Makalalar' AS tablename,
        COUNT(*) AS record_count
    FROM articles
    UNION ALL
    SELECT
        'Mugallymlar' AS tablename,
        COUNT(*) AS record_count
    FROM teachers
");// assuming this is your stored procedure call

        return view('livewire.admin.dashboard-component', compact('teachers', 'items'))
            ->layout('components.layouts.admin-app');
    }

    public function resetPassword()
    {
        //****
        try {
            $this->validate([
                'currentPassword' => 'required|min:6',
                'password' => 'required|min:6|confirmed',
            ]);

            Auth::user()->update([
                'password' => Hash::make($this->password),
            ]);

            session()->flash('success', 'Ваш пароль успешно изменен!');
            //$this->resetForm();
        } catch (ValidationException $e) {
            session()->flash('error', 'Текущий пароль введен неправильно.');
        }
    }


}
