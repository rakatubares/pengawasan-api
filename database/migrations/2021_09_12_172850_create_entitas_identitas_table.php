<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitasIdentitasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entitas_identitas', function (Blueprint $table) {
			$table->id();
			$table->morphs('identityable');
			$table->string('jenis');
			$table->string('nomor')->index();
			$table->string('pejabat_penerbit')->nullable();
			$table->string('tempat_penerbitan')->nullable();
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
		Schema::dropIfExists('entitas_identitas');
	}
}
