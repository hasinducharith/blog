<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryEloquentRepository implements CategoryRepositoryInterface{

    public function getAll(){
        return Category::orderBy('id', 'desc')->get();
    }

    public function getBySlug($slug){
        return Category::where('slug', $slug)->first();
    }
}