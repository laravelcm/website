<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('tutorials', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->unique();
			$table->string('slug')->unique();
			$table->text('content');
			$table->boolean('is_published')->default(false);
			$table->string('image')->nullable();
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::drop('tutorials');
	}
}
