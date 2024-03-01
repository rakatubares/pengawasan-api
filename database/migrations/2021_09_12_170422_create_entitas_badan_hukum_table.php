<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitasBadanHukumTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entitas_badan_hukum', function (Blueprint $table) {
			$table->id();
			$table->string('nama')->index();
			$table->text('alamat')->nullable();
			$table->string('nomor_telepon')->nullable();
			$table->string('email')->nullable();
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
		Schema::dropIfExists('entitas_badan_hukum');
	}
}
