<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penindakan', function (Blueprint $table) {
            $table->id();
			$table->integer('sprint_id')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->date('tanggal_mulai_penindakan')->nullable()->index();
			$table->time('waktu_mulai_penindakan')->nullable()->index();
			$table->date('tanggal_selesai_penindakan')->nullable()->index();
			$table->time('waktu_selesai_penindakan')->nullable()->index();
			$table->string('lokasi_penindakan')->nullable()->index();
			$table->integer('kategori_penindakan_id')->nullable()->index();
			$table->text('uraian_penindakan')->nullable();
			$table->text('alasan_penindakan')->nullable();
			$table->string('jenis_pelanggaran')->nullable()->index();
			$table->text('hal_terjadi')->nullable();
			$table->integer('saksi_id')->nullable()->index();
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
        Schema::dropIfExists('penindakan');
    }
}
