<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLpNTable extends Migration
{
	public function __construct()
	{
		$this->table_name = 'dok_lpn';
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
			$table->integer('sprint_id')->index();
			$table->text('kesimpulan')->nullable();
			$table->string('kode_jabatan_penyusun')->index();
			$table->boolean('plh_penyusun')->nullable()->index();
			$table->integer('penyusun_id')->index();
			$table->string('kode_jabatan_penerbit')->index();
			$table->boolean('plh_penerbit')->nullable()->index();
			$table->integer('penerbit_id')->index();
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
		Schema::dropIfExists($this->table_name);
	}
}
