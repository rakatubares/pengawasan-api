<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokNhiTertentuTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_nhi_tertentu', function (Blueprint $table) {
			$table->id();
			$table->string('jenis_dok')->nullable();
			$table->string('nomor_dok')->nullable();
			$table->date('tanggal_dok')->nullable();
			$table->string('nama_sarkut')->nullable();
			$table->string('no_flight_trayek')->nullable();
			$table->string('nomor_awb')->nullable();
			$table->date('tanggal_awb')->nullable();
			$table->string('merek_koli')->nullable();
			$table->string('entitas_type')->nullable();
			$table->integer('entitas_id')->nullable();
			$table->text('data_lain')->nullable();
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['entitas_type', 'entitas_id']);
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
		Schema::dropIfExists('dok_nhi_tertentu');
	}
}
