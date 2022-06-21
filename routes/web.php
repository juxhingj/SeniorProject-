<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['postsDetails'=>Post::all()]);
});


Route::get('postdetails/{post}', function (Post $post) {
    if(auth()->check())
        return view('postdetails',[
            'post' => $post,
            'users' => User::all(),
            'comments' => Comment::where('posts_id', '=', $post->id)->get(),
            'likes' => \App\Models\LikedPost::where('posts_id', '=', $post->id)->get()->count(),

            'liked_by_user' => \App\Models\LikedPost::where('posts_id', '=', $post->id)->where('users_id','=', auth()->user()->id)->get()->count()
        ]);
    else {
        return view('postdetails', [
            'post' => $post,
            'users' => User::all(),
            'comments' => Comment::where('posts_id', '=', $post->id)->get(),
            'likes' => \App\Models\LikedPost::where('posts_id', '=', $post->id)->get()->count(),

        ]);
    }
});


Route::get('like/{pid}', function ($pid) {
    $like = new \App\Models\LikedPost();
    $like->posts_id = $pid;
    $like->users_id = auth()->user()->id;
    $like->save();
    return redirect('/postdetails/' . $pid);
});

Route::get('unlike/{pid}', function ($pid) {
    $posts_id = $pid;
    $users_id =auth()->user()->id;
    $delete= \App\Models\LikedPost::where('posts_id',$posts_id)->where('users_id', $users_id)->delete();

    return redirect('/postdetails/' . $pid);
});

Route::post('postdetails',[\App\Http\Controllers\CommentController::class, 'store']);



Route::get('register', [\App\Http\Controllers\RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'store'])->middleware('guest');

Route::get('post',[\App\Http\Controllers\PostController::class, 'create']);
Route::post('post',[\App\Http\Controllers\PostController::class, 'store']);

Route::post('logout',[\App\Http\Controllers\SessionController::class, 'destroy'])->middleware('auth');

Route::get('login',[\App\Http\Controllers\SessionController::class, 'create'])->middleware('guest');
Route::post('sessions',[\App\Http\Controllers\SessionController::class, 'store'])->middleware('guest');

Route::get('profile', function () {
    return view('profile',['postsDetails'=>Post::all()]);
})->middleware('auth');
