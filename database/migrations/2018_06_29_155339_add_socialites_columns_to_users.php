<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialitesColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('laravel-oauth.users.table'), function (Blueprint $table) {
            foreach (config('laravel-oauth.providers') as $provider => $status) {
                if ($status === true) {
                    $table->string($provider.'_id')->nullable();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('laravel-oauth.users.table'), function (Blueprint $table) {
            foreach (config('laravel-oauth.providers') as $provider => $status) {
                if (Schema::hasColumn(config('laravel-oauth.users.table'), $provider.'_id')) {
                    $table->dropColumn($provider.'_id');
                }
            }
        });
    }
}
