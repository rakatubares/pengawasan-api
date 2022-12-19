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
			$table->string('jenis_pelanggaran');
			$table->string('pasal');
			$table->string('tempat_pelanggaran');
			$table->dateTime('waktu_pelanggaran');
			$table->text('modus');
			$table->integer('pelaku_id')->index();
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
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
		Schema::dropIfExists('penyidikan');
	}
}
