<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLppiTable extends Migration
{
	public function __construct()
	{
		$this->table_name = 'dok_lppi';
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->table_name, function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->boolean('flag_info_internal')->nullable()->index();
			$table->string('media_info_internal')->nullable()->index();
			$table->date('tgl_terima_info_internal')->nullable()->index();
			$table->string('no_dok_info_internal')->nullable()->index();
			$table->date('tgl_dok_info_internal')->nullable()->index();
			$table->boolean('flag_info_eksternal')->nullable()->index();
			$table->string('media_info_eksternal')->nullable()->index();
			$table->date('tgl_terima_info_eksternal')->nullable()->index();
			$table->string('no_dok_info_eksternal')->nullable()->index();
			$table->date('tgl_dok_info_eksternal')->nullable()->index();
			$table->integer('penerima_info_id')->nullable()->index();
			$table->integer('penilai_info_id')->nullable()->index();
			$table->text('kesimpulan')->nullable();
			$table->integer('disposisi_id')->index();
			$table->date('tanggal_disposisi')->nullable();
			$table->boolean('flag_analisis')->nullable();
			$table->boolean('flag_arsip')->nullable();
			$table->text('catatan')->nullable();
			$table->string('kode_jabatan')->index();
			$table->boolean('plh')->nullable()->index();
			$table->integer('pejabat_id')->index();
			$table->integer('kode_status')->index();
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
		Schema::dropIfExists($this->table_name);
	}
}
