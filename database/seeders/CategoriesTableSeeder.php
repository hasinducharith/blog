<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder{

    public function run(){

        $categories = array(
                0 =>
                    array(
                        'title' => 'Technology',
                        'slug' => 'technology',
                ),
                1 =>
                    array(
                        'title' => 'Business',
                        'slug' => 'business',
                ),
                2 =>
                    array(
                        'title' => 'Politics',
                        'slug' => 'politics',
                ),
                3 =>
                    array(
                        'title' => 'Science',
                        'slug' => 'science',
                ),
                4 =>
                    array(
                        'title' => 'Health',
                        'slug' => 'health',
                ),
                5 =>
                    array(
                        'title' => 'Travel',
                        'slug' => 'travel',
                )
        );

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}