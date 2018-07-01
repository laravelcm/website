<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('company_name');
			$table->string('logo')->nullable();
			$table->string('title');
			$table->text('description');
			$table->string('location');
			$table->boolean('is_published')->default(false);
			$table->boolean('is_visible')->default(false);
			$table->integer('user_id')->unsigned();
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
		Schema::drop('jobs');
	}
}
