<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $fillable = ['parent_id', 'comment', 'sender','date','post_id '];


    public function replies()
{
    return $this->hasMany(Comment::class, 'parent_id');
}


}
