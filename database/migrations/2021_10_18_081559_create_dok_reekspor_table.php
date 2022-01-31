<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokReeksporTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_reekspor', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->string('jenis_dok_asal')->index();
			$table->string('nomor_dok_asal')->index();
			$table->date('tanggal_dok_asal')->index();
			$table->string('jenis_dok_ekspor')->index();
			$table->string('nomor_dok_ekspor')->index();
			$table->date('tanggal_dok_ekspor')->index();
			$table->string('nomor_mawb')->nullable()->index();
			$table->date('tanggal_mawb')->nullable()->index();
			$table->string('nomor_hawb')->nullable()->index();
			$table->date('tanggal_hawb')->nullable()->index();
			$table->string('nama_sarkut')->nullable()->index();
			$table->string('nomor_flight')->nullable()->index();
			$table->date('tanggal_flight')->nullable()->index();
			$table->string('nomor_reg_sarkut')->nullable()->index();
			$table->text('kedapatan')->nullable();
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
        Schema::dropIfExists('dok_reekspor');
    }
}
