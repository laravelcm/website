<?php

namespace Modules\Tutorial\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Tutorial\Entities\Category;

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
        Category::create(['name' => 'React Native', 'slug' => 'react-native']);
        Category::create(['name' => 'VueJS', 'slug' => 'vue-js']);
        Category::create(['name' => 'Flutter', 'slug' => 'flutter']);
        Category::create(['name' => 'Hosting', 'slug' => 'hosting']);
        Category::create(['name' => 'Design', 'slug' => 'design']);
    }
}
