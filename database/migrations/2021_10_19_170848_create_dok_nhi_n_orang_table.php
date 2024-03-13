<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokNhiNOrangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_nhin_orang', function (Blueprint $table) {
            $table->id();
			$table->integer('entitas_id')->nullable()->index();
			$table->string('nomor_sarkut')->nullable();
			$table->string('kode_pelabuhan_asal')->nullable();
			$table->string('kode_pelabuhan_tujuan')->nullable();
			$table->date('tanggal_berangkat')->nullable();
			$table->time('waktu_berangkat')->nullable();
			$table->date('tanggal_datang')->nullable();
			$table->time('waktu_datang')->nullable();
			$table->text('data_lain')->nullable();
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
        Schema::dropIfExists('dok_nhin_orang');
    }
}
