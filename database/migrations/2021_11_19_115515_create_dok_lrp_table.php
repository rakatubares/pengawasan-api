<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLrpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_lrp', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable();
			$table->string('agenda_dok');
			$table->integer('thn_dok')->nullable();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->string('no_lk')->nullable();
			$table->date('tanggal_lk')->nullable();
			$table->string('no_sptp')->nullable();
			$table->date('tanggal_sptp')->nullable();
			$table->string('no_spdp')->nullable();
			$table->date('tanggal_spdp')->nullable();
			$table->text('alat_bukti_surat')->nullable();
			$table->text('alat_bukti_petunjuk')->nullable();
			$table->text('alternatif_penyelesaian')->nullable();
			$table->text('informasi_lain')->nullable();
			$table->text('catatan')->nullable();
			$table->integer('penyidik_id')->index();
			$table->string('kode_jabatan1');
			$table->boolean('plh1')->nullable();
			$table->integer('pejabat1_id')->index();
			$table->string('kode_jabatan2');
			$table->boolean('plh2')->nullable();
			$table->integer('pejabat2_id')->index();
			$table->integer('kode_status')->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['agenda_dok', 'thn_dok', 'no_dok']);
			$table->index('created_at');
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
        Schema::dropIfExists('dok_lrp');
    }
}
