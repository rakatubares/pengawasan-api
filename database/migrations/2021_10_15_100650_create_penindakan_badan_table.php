<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenindakanBadanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penindakan_badan', function (Blueprint $table) {
            $table->id();
			$table->integer('penindakan_id')->index();
			$table->integer('entitas_id')->index();
			$table->string('asal')->nullable();
			$table->string('tujuan')->nullable();
			$table->integer('pendamping_id')->nullable()->index();
			$table->string('nama_sarkut')->nullable();
			$table->string('jenis_sarkut')->nullable();
			$table->string('nomor_sarkut')->nullable();
			$table->integer('pengemudi_id')->nullable()->index();
			$table->string('bendera_sarkut')->nullable()->index();
			$table->string('registrasi_sarkut')->nullable();
			$table->string('jenis_dokumen')->nullable();
			$table->string('nomor_dokumen')->nullable();
			$table->date('tanggal_dokumen')->nullable();
			$table->text('uraian_pemeriksaan')->nullable();
			$table->text('hasil_pemeriksaan')->nullable();
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
        Schema::dropIfExists('penindakan_badan');
    }
}
