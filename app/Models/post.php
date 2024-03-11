<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'postid',
        'post',
        'image',
        'likes',
        'comments',
        'has_image',
        'user_email',
        'updated_at'
        

    ];


    public function comments()
{
    return $this->hasMany(Comment::class, 'post_id');
}
}
