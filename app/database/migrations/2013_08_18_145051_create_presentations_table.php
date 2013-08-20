<?php

use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('presentations', function($table)
    {
      $table->increments('id'); // auto-increment ID
      $table->string('title', 250);
      $table->string('slug', 250)->unique(); // unique url slug

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
    Schema::drop('presentations');
	}
}
