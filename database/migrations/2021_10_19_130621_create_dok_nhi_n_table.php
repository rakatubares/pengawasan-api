<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokNhiNTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_nhin', function (Blueprint $table) {
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
			$table->string('kd_kantor')->nullable();
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
			$table->integer('id_barang_exim')->nullable()->index();
			$table->text('data_lain_exim')->nullable();
			$table->boolean('flag_sarkut')->default(false);
			$table->string('nama_sarkut')->nullable();
			$table->string('jenis_sarkut')->nullable();
			$table->string('no_flight_trayek_sarkut')->nullable();
			$table->string('pelabuhan_asal_sarkut')->nullable();
			$table->string('pelabuhan_tujuan_sarkut')->nullable();
			$table->string('imo_mmsi_sarkut')->nullable();
			$table->text('data_lain_sarkut')->nullable();
			$table->boolean('flag_orang')->default(false);
			$table->string('entitas_id')->nullable()->index();
			$table->string('flight_voyage_orang')->nullable();
			$table->string('pelabuhan_asal_orang')->nullable();
			$table->string('pelabuhan_tujuan_orang')->nullable();
			$table->dateTime('waktu_berangkat_orang')->nullable();
			$table->dateTime('waktu_datang_orang')->nullable();
			$table->text('data_lain_orang')->nullable();
			$table->text('indikasi')->nullable();
			$table->string('kode_jabatan')->index();
			$table->boolean('plh_pejabat')->nullable()->index();
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
		Schema::dropIfExists('dok_nhin');
	}
}
