<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyidikanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penyidikan', function (Blueprint $table) {
			$table->id();
			$table->integer('chain_id')->index();
			$table->string('jenis_pelanggaran')->nullable();
			$table->string('pasal')->nullable();
			$table->string('tempat_pelanggaran')->nullable();
			$table->date('tanggal_pelanggaran')->nullable();
			$table->time('waktu_pelanggaran')->nullable();
			$table->boolean('tertangkap_tangan')->default(false);
			$table->text('modus')->nullable();
			$table->integer('pelaku_id')->index();
			$table->timestamps();
			$table->softDeletes();
			$table->string('created_by')->nullable();
			$table->string('updated_by')->nullable();
			$table->string('deleted_by')->nullable();
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
		Schema::dropIfExists('penyidikan');
	}
}
