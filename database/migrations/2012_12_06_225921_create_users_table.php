<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return null
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('activated')->default(0);
            $table->boolean('superuser')->default(0);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('preferences')->nullable();
            $table->string('token')->nullable();
            $table->uuid('api_token')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return null
     */
    public function down()
    {
        Schema::drop('users');
    }
}
