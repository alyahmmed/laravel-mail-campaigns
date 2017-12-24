<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_list', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->integer('gender_id')->nullable();
			$table->integer('nationality_id')->nullable();
			$table->string('phone')->nullable();
			$table->string('company')->nullable();
			$table->string('country')->nullable();
			$table->integer('status')->nullable();
			$table->integer('sms_statue')->nullable();
			$table->integer('activation')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mail_list');
	}

}
