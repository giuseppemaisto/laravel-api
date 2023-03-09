<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];
    public function Posts(){
        return $this->hasMany(Post::class);
    }
}
