<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function create()
    {
        return view('sessions.create');
    }



    public function  store()
    {
        $attributes =request()-> validate([
            'username' => 'required|max:44',
            'password' => 'required|max:44',
        ]);

        if(auth()->attempt($attributes)) {

            return redirect('/');
        }

        return back();
    }
}
