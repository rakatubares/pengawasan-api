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
			$table->enum('sifat',['segera','sangat segera']);
			$table->enum('klasifikasi',['rahasia','sangat rahasia']);
			$table->string('tujuan')->nullable();
			$table->string('tempat_indikasi')->nullable();
			$table->dateTime('waktu_indikasi')->nullable();
			$table->enum('zona_waktu',['WIB', 'WITA', 'WIT']);
			$table->string('kantor')->nullable();
			$table->boolean('flag_exim')->default(false);
			$table->string('jenis_dok_exim')->nullable();
			$table->string('nomor_dok_exim')->nullable();
			$table->date('tanggal_dok_exim')->nullable();
			$table->string('nama_sarkut_exim')->nullable();
			$table->string('no_flight_trayek_exim')->nullable();
			$table->string('nomor_awb_exim')->nullable();
			$table->date('tanggal_awb_exim')->nullable();
			$table->string('merek_koli_exim')->nullable();
			$table->string('importir_ppjk')->nullable();
			$table->string('npwp')->nullable();
			$table->string('data_lain_exim')->nullable();
			$table->boolean('flag_bkc')->default(false);
			$table->string('tempat_penimbunan')->nullable();
			$table->string('penyalur')->nullable();
			$table->string('tempat_penjualan')->nullable();
			$table->string('nppbkc')->nullable();
			$table->string('nama_sarkut_bkc')->nullable();
			$table->string('no_flight_trayek_bkc')->nullable();
			$table->string('data_lain_bkc')->nullable();
			$table->boolean('flag_tertentu')->default(false);
			$table->string('jenis_dok_tertentu')->nullable();
			$table->string('nomor_dok_tertentu')->nullable();
			$table->date('tanggal_dok_tertentu')->nullable();
			$table->string('nama_sarkut_tertentu')->nullable();
			$table->string('no_flight_trayek_tertentu')->nullable();
			$table->string('nomor_awb_tertentu')->nullable();
			$table->date('tanggal_awb_tertentu')->nullable();
			$table->string('merek_koli_tertentu')->nullable();
			$table->string('orang_badan_hukum')->nullable();
			$table->string('data_lain_tertentu')->nullable();
			$table->integer('barang_id')->nullable();
			$table->text('indikasi')->nullable();
			$table->string('kode_jabatan')->index();
			$table->boolean('plh_pejabat')->nullable()->index();
			$table->integer('pejabat_id')->index();
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
		Schema::dropIfExists('dok_nhi');
	}
}
