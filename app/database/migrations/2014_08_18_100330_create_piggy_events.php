<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiggyEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piggybank_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('piggybank_id')->unsigned();
            $table->date('date');
            $table->decimal('amount', 10, 2);

            // connect instance to piggybank.
            $table->foreign('piggybank_id')
                ->references('id')->on('piggybanks')
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
		Schema::drop('piggybank_events');
	}

}