<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
      return view('register.create');
    }

    public function store(){
      //create a new user_id
      $attributes=request()->validate([
        'name' =>'required|max:255',
        'username' =>'required|max:255|min:2|unique:users,username',
        //'username' =>'required', 'max:255', 'min:2', Rule::unique('users', 'username'),
        'email' =>'required|email|max:255|unique:users,email',
        'password' =>'required|max:255|min:6',
      ]);
      $user = User::create($attributes);
      auth()->login($user);

      session()->flash('success', 'Welcome to the jungle!, your account is made');

      return redirect('/');
    }
}
