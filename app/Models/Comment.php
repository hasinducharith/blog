<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model{


    protected $fillable = [
        'name',
        'email',
        'feedback',
        'post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function formated_date(){
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
