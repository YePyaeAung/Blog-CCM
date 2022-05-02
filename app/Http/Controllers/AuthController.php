<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $formData = request()->validate([
            'name' => 'required | max:255 | min:3',
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required | min:8',
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', "Thanks for Registeration! Dear \"$user->name\"");
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', "Logged Out !!!");
    }
}