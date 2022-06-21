<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedPost extends Model
{
    use HasFactory;
    protected $table = "likedposts";

    protected $fillable = [
        'users_id',
        'posts_id',
    ];


    public $timestamps = false;

}
