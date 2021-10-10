<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbpBarangDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbp_barang_details', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('sbp_barang_id');
			$table->foreign('sbp_barang_id')
				->references('id')
				->on('sbp_penindakan_barangs')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->double('jumlah_barang');
			$table->string('satuan_barang');
			$table->text('uraian_barang');
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
        Schema::dropIfExists('sbp_barang_details');
    }
}
