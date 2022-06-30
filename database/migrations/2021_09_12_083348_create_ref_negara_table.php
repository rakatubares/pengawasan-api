<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefNegaraTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_negara', function (Blueprint $table) {
			$table->id();
			$table->string('kode_2')->unique();
			$table->string('kode_3')->unique();
			$table->string('nama_negara')->index();
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
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
		Schema::dropIfExists('ref_negara');
	}
}
