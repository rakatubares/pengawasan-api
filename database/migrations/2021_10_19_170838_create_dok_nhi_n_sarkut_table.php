<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokNhiNSarkutTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_nhin_sarkut', function (Blueprint $table) {
			$table->id();
			$table->string('nama_sarkut')->nullable();
			$table->string('jenis_sarkut')->nullable();
			$table->string('nomor_sarkut')->nullable();
			$table->string('kode_pelabuhan_asal')->nullable();
			$table->string('kode_pelabuhan_tujuan')->nullable();
			$table->string('imo_mmsi')->nullable();
			$table->text('data_lain')->nullable();
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
		Schema::dropIfExists('dok_nhin_sarkut');
	}
}
