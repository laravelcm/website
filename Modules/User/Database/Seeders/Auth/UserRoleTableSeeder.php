<?php

namespace Modules\User\Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Modules\User\Traits\DisableForeignKeys;

class UserRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        User::find(1)->assignRole(config('project.users.admin_role'));

        $this->enableForeignKeys();
    }
}
