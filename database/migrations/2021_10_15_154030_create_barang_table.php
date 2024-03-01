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
			$table->integer('kategori_id')->nullable()->index();
			$table->float('berat')->nullable();
			$table->string('satuan_berat')->nullable();
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
        Schema::dropIfExists('barang');
    }
}
