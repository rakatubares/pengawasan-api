<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbp', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->integer('sprint_id')->index();
			$table->boolean('detail_sarkut')->default(0)->index();
			$table->boolean('detail_barang')->default(0)->index();
			$table->boolean('detail_bangunan')->default(0)->index();
			$table->boolean('detail_badan')->default(0)->index();
			$table->string('lokasi_penindakan')->index();
			$table->text('uraian_penindakan')->nullable();
			$table->text('alasan_penindakan')->nullable();
			$table->string('jenis_pelanggaran')->index();
			$table->dateTime('wkt_mulai_penindakan')->index();
			$table->dateTime('wkt_selesai_penindakan')->index();
			$table->text('hal_terjadi')->nullable();
			$table->integer('saksi_id')->index();
			$table->integer('petugas1_id')->index();
			$table->integer('petugas2_id')->nullable()->index();
			$table->integer('kode_status')->index();
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
        Schema::dropIfExists('sbp');
    }
}
