<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Category::create(['name' => 'Laravel', 'slug' => 'laravel']);
        Category::create(['name' => 'React', 'slug' => 'react']);
        Category::create(['name' => 'VueJS', 'slug' => 'vue-js']);
        Category::create(['name' => 'JavaScript', 'slug' => 'javascript']);
        Category::create(['name' => 'Développement Mobile', 'slug' => 'mobile-development']);
        Category::create(['name' => 'Hosting', 'slug' => 'hosting']);
        Category::create(['name' => 'Astuces', 'slug' => 'astuces-developpeur']);
    }
}
