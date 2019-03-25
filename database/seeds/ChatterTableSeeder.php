<?php

use Illuminate\Database\Seeder;

class ChatterTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // CREATE THE USER

        if (!\DB::table('users')->find(1)) {
            $data = [
                'first_name' => 'Monney',
                'last_name'  => 'Arthur',
                'email'      => 'arthur.monney@laravelcm.com',
                'superuser' => 1,
                'activated' => 1,
                'password' => Hash::make('monney'),
            ];

            \TypiCMS\Modules\Users\Models\User::create($data);
        }

        // CREATE THE CATEGORIES

        \DB::table('chatter_categories')->delete();

        \DB::table('chatter_categories')->insert([
            0 => [
                'id'         => 1,
                'parent_id'  => null,
                'order'      => 1,
                'name'       => 'General',
                'color'      => '#2ECC71',
                'slug'       => 'general',
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id'         => 2,
                'parent_id'  => null,
                'order'      => 2,
                'name'       => 'Laravel',
                'color'      => '#E74430',
                'slug'       => 'laravel',
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id'         => 3,
                'parent_id'  => null,
                'order'      => 3,
                'name'       => 'Site Feedback',
                'color'      => '#F39C12',
                'slug'       => 'site-feedback',
                'created_at' => null,
                'updated_at' => null,
            ],
            3 => [
                'id'         => 4,
                'parent_id'  => null,
                'order'      => 4,
                'name'       => 'Random',
                'color'      => '#E67E22',
                'slug'       => 'random',
                'created_at' => null,
                'updated_at' => null,
            ],
            4 => [
                'id'         => 5,
                'parent_id'  => null,
                'order'      => 5,
                'name'       => 'PHP',
                'color'      => '#9B59B6',
                'slug'       => 'php',
                'created_at' => null,
                'updated_at' => null,
            ],
            5 => [
                'id'         => 6,
                'parent_id'  => null,
                'order'      => 6,
                'name'       => 'Javascript',
                'color'      => '#ebc217',
                'slug'       => 'javascript',
                'created_at' => null,
                'updated_at' => null,
            ],
            6 => [
                'id'         => 7,
                'parent_id'  => null,
                'order'      => 7,
                'name'       => 'HTML & CSS',
                'color'      => '#ff8c4b',
                'slug'       => 'html-css',
                'created_at' => null,
                'updated_at' => null,
            ],
            7 => [
                'id'         => 8,
                'parent_id'  => null,
                'order'      => 8,
                'name'       => 'Guides',
                'color'      => '#D51E1B',
                'slug'       => 'guides',
                'created_at' => null,
                'updated_at' => null,
            ],
            8 => [
                'id'         => 9,
                'parent_id'  => null,
                'order'      => 9,
                'name'       => 'React',
                'color'      => '#09d9fe',
                'slug'       => 'react',
                'created_at' => null,
                'updated_at' => null,
            ],
            9 => [
                'id'         => 10,
                'parent_id'  => null,
                'order'      => 10,
                'name'       => 'Vue',
                'color'      => '#3AB981',
                'slug'       => 'vue',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        // CREATE THE DISCUSSIONS

        \DB::table('chatter_discussion')->delete();

        // CREATE THE POSTS

        \DB::table('chatter_post')->delete();
    }
}
