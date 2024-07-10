<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserRagisterComponent extends Component
{
    //#[Validate('required|min:3|max:50')]
    public $name;
    //#[Validate('required|email')]
    public $email;
    //#[Validate('required|min:6|confirmed')]
    public $password;
    //#[Validate('required')]
    public $agree;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ];

    protected $messages = [
        'name.required' => 'Имя обязательно для заполнения.',
        'name.string' => 'Имя должно быть строкой.',
        'name.max' => 'Имя не должно превышать 255 символов.',
        'email.required' => 'Email обязателен для заполнения.',
        'email.email' => 'Введите корректный Email адрес.',
        'email.unique' => 'Этот Email уже используется.',
        'password.required' => 'Пароль обязателен для заполнения.',
        'password.min' => 'Пароль должен содержать не менее 6 символов.',
        'password.confirmed' => 'Пароли не совпадают.',
    ];
    
    
    public function render()
    {
        return view('livewire.user.user-ragister-component');
    }

    public function login()
    {
        $user = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($user))
        {
            Auth::user($user);
            $this->redirectRoute('home');
            session()->flash('success', __('You are logged in'));
        } else {
            session()->flash('error', __('The username or password is incorrect '));
        }
    }

    public function registerUser()
    {
        //dd('reg');
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        session()->flash('success', 'Successful registration');
        Auth::login($user);

        $this->redirectRoute('home');
    }
}
