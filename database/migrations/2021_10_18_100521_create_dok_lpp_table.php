<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLppTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_lpp', function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable();
			$table->string('agenda_dok');
			$table->integer('thn_dok')->nullable();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->string('asal_perkara')->nullable();
			$table->string('jenis_penindakan');
			$table->string('jenis_perkara');
			$table->string('status_pelanggaran');
			$table->text('catatan')->nullable();
			$table->integer('petugas_id')->index();
			$table->string('kode_jabatan1');
			$table->boolean('plh1')->nullable();
			$table->integer('pejabat1_id')->index();
			$table->string('kode_jabatan2');
			$table->boolean('plh2')->nullable();
			$table->integer('pejabat2_id')->index();
			$table->integer('kode_status')->index();
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['agenda_dok', 'thn_dok', 'no_dok']);
			$table->index('created_at');
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
		Schema::dropIfExists('dok_lpp');
	}
}
