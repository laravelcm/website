<?php

use Illuminate\Database\Seeder;

class MenulinkSeeder extends Seeder
{
    public function run()
    {
        $typi_menulinks = [
            ['id' => 1, 'menu_id' => 1, 'page_id' => 1, 'status' => '{"fr":"1","en":"1","nl":"1"}', 'title' => '{"fr":"Accueil","nl":"Home","en":"Home"}', 'url' => '{"fr":null,"en":null,"nl":null}', 'position' => 1, 'target' => null, 'class' => null, 'icon_class' => null, 'has_categories' => 0, 'created_at' => '2014-03-28 22:08:05', 'updated_at' => '2014-03-28 18:58:25'],
            ['id' => 2, 'menu_id' => 1, 'page_id' => 2, 'status' => '{"fr":"1","en":"1","nl":"1"}', 'title' => '{"fr":"Contact","nl":"Contact","en":"Contact"}', 'url' => '{"fr":null,"en":null,"nl":null}', 'position' => 2, 'target' => null, 'class' => null, 'icon_class' => null, 'has_categories' => 0, 'created_at' => '2014-03-28 23:18:49', 'updated_at' => '2014-03-28 18:58:25'],
            ['id' => 3, 'menu_id' => 2, 'page_id' => 2, 'status' => '{"fr":"1","en":"1","nl":"1"}', 'title' => '{"fr":"Contact","nl":"Contact","en":"Contact"}', 'url' => '{"fr":null,"en":null,"nl":null}', 'position' => 1, 'target' => null, 'class' => null, 'icon_class' => null, 'has_categories' => 0, 'created_at' => '2014-03-28 17:20:16', 'updated_at' => '2014-03-28 13:32:46'],
        ];

        DB::table('menulinks')->insert($typi_menulinks);
    }
}
