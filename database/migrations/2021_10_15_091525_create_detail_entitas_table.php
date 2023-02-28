<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEntitasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_entitas', function (Blueprint $table) {
			$table->id();
			$table->string('entityable_type');
			$table->integer('entityable_id');
			$table->string('position');
			$table->integer('entity_id');
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['entityable_type', 'entityable_id', 'position']);
			$table->index('deleted_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('detail_entitas');
	}
}
