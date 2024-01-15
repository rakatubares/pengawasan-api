<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPetugasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_petugas', function (Blueprint $table) {
			$table->id();
			$table->string('officerable_type');
			$table->integer('officerable_id');
			$table->string('posisi');
			$table->boolean('flag_pejabat');
			$table->string('kode_jabatan')->nullable();
			$table->string('tipe_ttd')->nullable();
			$table->string('nip');
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['officerable_type', 'officerable_id', 'posisi']);
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
		Schema::dropIfExists('detail_petugas');
	}
}
