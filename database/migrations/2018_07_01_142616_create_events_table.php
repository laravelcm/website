<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->unique();
			$table->string('slug')->unique();
			$table->date('date');
			$table->time('start_time');
			$table->time('end_time');
			$table->string('location');
			$table->text('description');
			$table->string('price', 20)->default('0');
			$table->smallInteger('number_of_places');
			$table->string('image');
			$table->boolean('is_approved')->default(false);
			$table->boolean('subscribe')->default(false);
			$table->string('link')->nullable();
			$table->timestamps();
		});

		Schema::create('event_user', function (Blueprint $table) {
		    $table->unsignedInteger('event_id');
		    $table->unsignedInteger('user_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
        });
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
	    Schema::drop('event_user');
		Schema::drop('events');
	}
}
