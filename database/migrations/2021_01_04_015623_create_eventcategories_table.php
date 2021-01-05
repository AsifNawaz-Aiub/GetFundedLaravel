<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventcategories', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('categoryName', 65535);
			$table->text('description', 65535);
			$table->dateTime('createdAt');
			$table->dateTime('updatedAt');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventcategories');
	}

}
