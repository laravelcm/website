<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Forum\Entities\Thread;

$factory->define(Thread::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'user_id' => function () {
            return factory('Modules\User\Entities\User')->create()->id;
        },
        'channel_id' => random_int(1, 8),
        'title' => $title,
        'body'  => $faker->paragraph,
        'visits' => 0,
        'slug' => str_slug($title),
        'locked' => false
    ];
});
