<?php

namespace Modules\Forum\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Channel::create(['name' => 'Laravel', 'slug' => 'laravel']);
        Channel::create(['name' => 'React', 'slug' => 'react']);
        Channel::create(['name' => 'Vue', 'slug' => 'vue']);
        Channel::create(['name' => 'JavaScript', 'slug' => 'javascript']);
        Channel::create(['name' => 'HTML/CSS', 'slug' => 'html-css']);
        Channel::create(['name' => 'PHP', 'slug' => 'php']);
        Channel::create(['name' => 'Design', 'slug' => 'design']);
        Channel::create(['name' => 'Feedback', 'slug' => 'feedback']);
    }
}
