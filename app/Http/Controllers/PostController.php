<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(){



        $attributes = request()-> validate([
            'title' => 'required|max:44',
            'description' => 'required|max:44',
            'fileName' => 'required|unique:posts,fileName',
            'users_id' => 'required|max:44',
        ]);

        $oldFile=request()->file('fileName')->getClientOriginalName();


        $input =request()->file('fileName');
        $destinationPath = 'modelsFiles'; // path to save to, has to exist and be writeable
        $filename = $input->getClientOriginalName(); // original name that it was uploaded with
        $input->move($destinationPath,$filename);


        $attributes['fileName']=$oldFile;
        Post::create($attributes);

        return redirect('/');

    }


}
