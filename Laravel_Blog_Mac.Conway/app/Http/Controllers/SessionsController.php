<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy(){
      auth()->logout();
      return redirect('/')->with('success', 'GoodBye!');
    }

    public function create(){
      return view('sessions.create');
    }

    public function store(){
      $credentials = request()->validate([
        'email' =>'required|email',
        'password' =>'required',
      ]);

      if(auth()->attempt($credentials)){
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back to the party!');
      }
      return back()
        ->withInput()
        ->withErrors(['email' => 'Invalid Sign-in information']);
    }
}
