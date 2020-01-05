<?php

use Faker\Generator as Faker;

$factory->define(\Modules\User\Entities\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
