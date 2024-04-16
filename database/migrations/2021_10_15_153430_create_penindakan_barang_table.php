<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenindakanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penindakan_barang', function (Blueprint $table) {
            $table->id();
			$table->integer('penindakan_id')->index();
			$table->integer('jumlah_kemasan')->nullable();
			$table->integer('jenis_kemasan_id')->nullable()->index();
			$table->string('nomor_kemasan')->nullable();
			$table->string('jenis_dokumen')->nullable();
			$table->string('nomor_dokumen')->nullable();
			$table->date('tanggal_dokumen')->nullable();
			$table->integer('pemilik_id')->nullable()->index();
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
        Schema::dropIfExists('penindakan_barang');
    }
}
