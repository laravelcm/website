<?php

namespace Modules\User\Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Modules\User\Traits\DisableForeignKeys;

class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Monney',
            'last_name' => 'Arthur',
            'email' => 'monneylobe@gmail.com',
            'password' => 'monneylobe',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Demo',
            'last_name' => 'User',
            'email' => 'demo@user.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        $this->enableForeignKeys();
    }
}
