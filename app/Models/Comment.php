<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'content',
        'posts_id',
        'users_id',
    ];


    public $timestamps = false;

}
