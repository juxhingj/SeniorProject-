<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes = request()-> validate([
            'username' => 'required|max:44|unique:users,username',
            'password' => 'required|max:44',
        ]);

        $attributes['password']=bcrypt($attributes['password']);

        $user=User::create($attributes);

        auth()->login($user);

        return redirect('/');

    }


}
