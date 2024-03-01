<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokNhiTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_nhi', function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->enum('sifat',['segera','sangat segera']);
			$table->enum('klasifikasi',['rahasia','sangat rahasia']);
			$table->string('tujuan')->nullable();
			$table->string('tempat_indikasi')->nullable();
			$table->dateTime('waktu_indikasi')->nullable();
			$table->enum('zona_waktu',['WIB', 'WITA', 'WIT']);
			$table->string('kode_kantor')->nullable();
			$table->string('detail_type')->nullable();
			$table->integer('detail_id')->nullable();
			$table->integer('detail_barang_id')->nullable()->index();
			$table->text('indikasi')->nullable();
			$table->string('kode_status')->index();
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
		Schema::dropIfExists('dok_nhi');
	}
}
