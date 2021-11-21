<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitipTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('titip', function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->integer('sprint_id')->index();
			$table->string('lokasi_titip')->index();
			$table->boolean('detail_sarkut')->default(0)->index();
			$table->boolean('detail_barang')->default(0)->index();
			$table->boolean('detail_bangunan')->default(0)->index();
			$table->string('nomor_ba_segel')->nullable()->index();
			$table->date('tanggal_segel')->nullable()->index();
			$table->integer('penerima_id')->index();
			$table->integer('saksi_id')->nullable()->index();
			$table->string('pejabat1')->index();
			$table->string('pejabat2')->nullable()->index();
			$table->integer('kode_status')->index();
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index('created_at');
			$table->index('updated_at');
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
		Schema::dropIfExists('titip');
	}
}
