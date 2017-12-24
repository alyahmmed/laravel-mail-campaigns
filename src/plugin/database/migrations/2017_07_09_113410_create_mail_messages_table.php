<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('subject', 500);
			$table->text('content');
			$table->integer('theme_id')->nullable();
			$table->integer('diabetes_id')->nullable();
			$table->integer('gender_id')->nullable();
			$table->integer('lifestyle_id')->nullable();
			$table->integer('location_id')->nullable();
			$table->integer('nationality_id')->nullable();
			$table->integer('case_id')->nullable();
			$table->integer('p_interests_id')->nullable();
			$table->integer('s_interests_id')->nullable();
			$table->integer('type_visitor_id')->nullable();
			$table->integer('site_id')->nullable();
			$table->integer('start')->nullable();
			$table->integer('end')->nullable();
			$table->boolean('is_finished')->default(0);
			$table->integer('send_pulse')->default(0);
			$table->string('send_pulse_time')->default(0);
			$table->string('sent_count')->default(0);
			$table->integer('clicked')->default(0);
			$table->integer('is_active')->default(1);
			$table->integer('registered')->default(0);
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
		Schema::drop('mail_messages');
	}

}
