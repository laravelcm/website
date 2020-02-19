<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Forum\Entities\Reply;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'thread_id' => function () {
            return factory('Modules\Forum\Entities\Thread')->create()->id;
        },
        'user_id' => function () {
            return factory('Modules\User\Entities\User')->create()->id;
        },
        'body'  => $faker->paragraph
    ];
});
