<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfiles', function(Blueprint $table){
			$table->increments('id');
			$table->string('photo', 100)->nullable()->unique();
			$table->string('descripcion',100)->nullable();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
      			->references('id')->on('users')
      			->onDelete('cascade');
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
		Schema::drop('perfiles');
	}

}
