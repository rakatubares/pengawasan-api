<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
			$table->morphs('goodsable');
			$table->double('jumlah_barang');
			$table->integer('satuan_id')->index();
			$table->text('uraian_barang');
			$table->text('merk')->nullable();
			$table->text('kondisi')->nullable();
			$table->text('tipe')->nullable();
			$table->text('spesifikasi_lain')->nullable();
			$table->integer('kategori_id')->nullable()->index();
			$table->float('berat')->nullable();
            $table->timestamps();
			$table->softDeletes();
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
        Schema::dropIfExists('barang');
    }
}
