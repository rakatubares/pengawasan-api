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
			$table->integer('chain_id')->index();
			$table->integer('sprint_id')->nullable()->index();
			$table->date('tanggal_buka_pengaman')->nullable();
			$table->string('asal_pengaman')->nullable();
			$table->string('jenis_pengaman')->nullable();
			$table->integer('jumlah_pengaman')->nullable();
			$table->string('satuan_pengaman')->nullable();
			$table->string('tempat_pengaman')->nullable();
			$table->string('dasar_pengamanan')->nullable();
			$table->string('nomor_pengaman')->nullable();
			$table->date('tanggal_pengaman')->nullable();
			$table->integer('saksi_id')->nullable()->index();
			$table->string('kode_status')->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->string('created_by')->nullable()->index();
			$table->string('updated_by')->nullable();
			$table->string('deleted_by')->nullable();
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
