<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('github_id')->nullable();
            $table->string('google_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'twitter_profile', 'github_profile', 'facebook_id', 'github_id', 'google_id']);
        });
    }
}
