<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLpfTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_lpf', function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable();
			$table->string('agenda_dok');
			$table->integer('thn_dok')->nullable();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->integer('saksi_id')->nullable()->index();
			$table->date('tanggal_bap_saksi')->nullable();
			$table->integer('tersangka_id')->nullable()->index();
			$table->date('tanggal_bap_tersangka')->nullable();
			$table->string('resume_perkara')->nullable();
			$table->date('tanggal_resume_perkara')->nullable();
			$table->string('jenis_dokumen_lain')->nullable();
			$table->string('nomor_dokumen_lain')->nullable();
			$table->date('tanggal_dokumen_lain')->nullable();
			$table->text('kesimpulan')->nullable();
			$table->string('usulan')->nullable();
			$table->text('catatan')->nullable();
			$table->string('kode_status')->index();
			$table->boolean('status_tindak_lanjut')->default(false)->index();
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->string('created_by')->nullable()->index();
			$table->string('updated_by')->nullable();
			$table->string('deleted_by')->nullable();
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
		Schema::dropIfExists('dok_lpf');
	}
}
