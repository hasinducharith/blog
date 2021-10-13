<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model{

    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'description',
        'photo'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    
    public function formated_date(){
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
