<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbpPenindakanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbp_penindakan_barangs', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('sbp_id');
			$table->foreign('sbp_id')
				->references('id')
				->on('sbp_headers')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->integer('jumlah_kemasan');
			$table->string('satuan_kemasan')->index();
			$table->string('jns_dok')->nullable()->index();
			$table->string('no_dok')->nullable()->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->string('pemilik')->index();
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
        Schema::dropIfExists('sbp_penindakan_barangs');
    }
}
