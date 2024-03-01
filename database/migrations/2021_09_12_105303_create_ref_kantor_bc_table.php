<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefKantorBCTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_kantor_bc', function (Blueprint $table) {
			$table->id();
			$table->string('kode_kantor')->unique();
			$table->string('nama_kantor_pendek')->nullable();
			$table->string('nama_kantor_panjang')->nullable();
			$table->string('kode_kantor_induk')->nullable();
			$table->integer('kode_kantor_group')->nullable();
			$table->integer('kode_eselon')->nullable();
			$table->integer('kode_pulau')->nullable();
			$table->integer('kode_kabupaten')->nullable();
			$table->string('alamat1')->nullable();
			$table->string('alamat2')->nullable();
			$table->string('kode_pos')->nullable();
			$table->string('telepon')->nullable();
			$table->string('fax')->nullable();
			$table->string('website')->nullable();
			$table->float('longitude')->nullable();
			$table->float('latitude')->nullable();
			$table->string('flag_kanwil')->nullable();
			$table->string('flag_aktif')->nullable();
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
		Schema::dropIfExists('ref_kantor_bc');
	}
}
