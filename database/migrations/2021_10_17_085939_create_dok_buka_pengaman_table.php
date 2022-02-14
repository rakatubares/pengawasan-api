<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokBukaPengamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_buka_pengaman', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('sprint_id')->index();
			$table->string('jenis_pengaman')->index();
			$table->integer('jumlah_pengaman');
			$table->string('satuan_pengaman')->nullable()->index();
			$table->string('tempat_pengaman')->nullable()->index();
			$table->string('dasar_pengamanan')->nullable()->index();
			$table->string('nomor_pengaman')->nullable()->index();
			$table->date('tanggal_pengaman')->nullable()->index();
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
        Schema::dropIfExists('dok_buka_pengaman');
    }
}
