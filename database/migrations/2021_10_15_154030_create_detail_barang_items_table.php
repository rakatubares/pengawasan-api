<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBarangItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang_items', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('detail_barang_id');
			$table->foreign('detail_barang_id')
				->references('id')
				->on('detail_barang')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->double('jumlah_barang');
			$table->integer('satuan_id')->index();
			$table->text('uraian_barang');
			$table->integer('kategori_id')->nullable()->index();
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
        Schema::dropIfExists('detail_barang_items');
    }
}
