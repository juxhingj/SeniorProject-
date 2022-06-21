<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use App\Models\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function store(){


        $attributes = request()-> validate([
            'content' => 'required|max:250',
            'posts_id' => 'required|max:44',
            'users_id' => 'required|max:44',
        ]);


        Comment::create($attributes);

        return redirect('/postdetails/'.$attributes['posts_id']);

    }


}
