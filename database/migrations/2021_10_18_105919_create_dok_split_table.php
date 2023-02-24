<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokSplitTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_split', function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable();
			$table->string('agenda_dok');
			$table->integer('thn_dok')->nullable();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->text('dugaan_pelanggaran')->nullable();
			$table->string('kode_jabatan');
			$table->boolean('plh')->nullable();
			$table->integer('pejabat_id')->index();
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
		Schema::dropIfExists('dok_split');
	}
}
