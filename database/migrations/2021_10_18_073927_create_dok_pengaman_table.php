<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokPengamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_pengaman', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->text('alasan_pengamanan')->nullable();
			$table->text('keterangan')->nullable();
			$table->string('jenis_pengaman')->index();
			$table->integer('jumlah_pengaman');
			$table->string('satuan_pengaman')->nullable();
			$table->string('nomor_pengaman')->nullable();
			$table->string('tempat_pengaman')->nullable();
			$table->string('kode_status')->index();
			$table->boolean('status_buka')->default(false)->index();
            $table->timestamps();
			$table->softDeletes();
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
        Schema::dropIfExists('dok_pengaman');
    }
}
