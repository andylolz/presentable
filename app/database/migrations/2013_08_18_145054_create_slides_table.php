<?php

use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('slides', function($table)
    {
      $table->increments('id');
      $table->integer('presentation_id'); // corresponding presentation ID

      $table->text('contents'); // slide content (in HTML/Markdown)
      $table->integer('number'); // slide position in presentation

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
		Schema::drop('slides');
	}
}
