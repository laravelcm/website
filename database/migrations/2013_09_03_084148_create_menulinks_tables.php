<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenulinksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return null
     */
    public function up()
    {
        Schema::create('menulinks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('page_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->integer('position')->unsigned()->default(0);
            $table->string('target', 10)->nullable();
            $table->string('class')->nullable();
            $table->string('icon_class')->nullable();
            $table->boolean('has_categories')->nullable();
            $table->json('status');
            $table->json('title', 100);
            $table->json('url');
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menulinks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return null
     */
    public function down()
    {
        Schema::drop('menulinks');
    }
}
