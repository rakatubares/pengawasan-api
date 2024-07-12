<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLppiTable extends Migration
{
	protected $tableName = 'dok_lppi';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tableName, function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->boolean('flag_info_internal')->nullable();
			$table->string('media_info_internal')->nullable();
			$table->date('tgl_terima_info_internal')->nullable();
			$table->string('no_dok_info_internal')->nullable()->index();
			$table->date('tgl_dok_info_internal')->nullable();
			$table->boolean('flag_info_eksternal')->nullable();
			$table->string('media_info_eksternal')->nullable();
			$table->date('tgl_terima_info_eksternal')->nullable();
			$table->string('no_dok_info_eksternal')->nullable()->index();
			$table->date('tgl_dok_info_eksternal')->nullable();
			$table->text('kesimpulan')->nullable();
			$table->date('tanggal_disposisi')->nullable();
			$table->boolean('flag_analisis')->nullable();
			$table->boolean('flag_arsip')->nullable();
			$table->text('catatan')->nullable();
			$table->string('kode_status')->index();
			$table->boolean('status_tindak_lanjut')->default(false)->index();
			$table->timestamps();
			$table->softDeletes();
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
		Schema::dropIfExists($this->tableName);
	}
}
