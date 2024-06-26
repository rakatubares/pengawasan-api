<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyidikanBhpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyidikan_bhp', function (Blueprint $table) {
			$table->id();
			$table->integer('penyidikan_id')->index();
			$table->integer('jumlah_kemasan')->nullable();
			$table->integer('jenis_kemasan_id')->nullable()->index();
			$table->string('nomor_kemasan')->nullable();
			$table->string('jenis_dokumen')->nullable();
			$table->string('nomor_dokumen')->nullable();
			$table->date('tanggal_dokumen')->nullable();
			$table->string('nama_sarkut')->nullable();
			$table->string('jenis_sarkut')->nullable();
			$table->string('nomor_sarkut')->nullable();
			$table->string('registrasi_sarkut')->nullable();
			$table->string('nomor_kontainer')->nullable();
			$table->string('ukuran_kontainer')->nullable();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('penyidikan_bhp');
    }
}
