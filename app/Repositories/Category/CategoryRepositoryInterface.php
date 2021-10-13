<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface{
    public function getAll();
    public function getBySlug($slug);
}