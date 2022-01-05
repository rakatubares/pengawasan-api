<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokBastTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_bast', function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->string('object_type')->nullable()->index();
			$table->string('object_id')->nullable()->index();
			$table->string('yang_menerima_type')->index();
			$table->string('yang_menerima_id')->index();
			$table->string('atas_nama_yang_menerima')->nullable()->index();
			$table->string('yang_menyerahkan_type')->index();
			$table->string('yang_menyerahkan_id')->index();
			$table->string('atas_nama_yang_menyerahkan')->nullable()->index();
			$table->string('dalam_rangka')->nullable()->index();
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
		Schema::dropIfExists('dok_bast');
	}
}
