<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Type;

class Post extends Model
{
    protected $fillable = ['title','language','description','slug','type_id','cover_image'];
    use HasFactory;

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function type(){
        return $this->belongsTo(type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
