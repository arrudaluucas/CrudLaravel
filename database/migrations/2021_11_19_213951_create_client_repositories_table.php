<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateClientRepositoriesTable.
 */
class CreateClientRepositoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
            $table->integer('state');
            $table->string('document');
            $table->string('phone');
            $table->integer('city');
            $table->integer('situation');
            $table->boolean('indication');
            $table->boolean('faceToFace');
            $table->boolean('facebook');
            $table->boolean('site');
			$table->string('email')->unique();
            $table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client');
	}
}
