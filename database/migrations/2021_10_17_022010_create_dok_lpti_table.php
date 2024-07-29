<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLptiTable extends Migration
{
    protected $tableName = 'dok_lpti';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->integer('no_dok')->nullable()->index();
            $table->string('agenda_dok')->index();
            $table->integer('thn_dok')->nullable()->index();
            $table->string('no_dok_lengkap')->index();
            $table->date('tanggal_dokumen')->nullable()->index();
            $table->integer('chain_id')->index();
            $table->string('tempat_pengumpulan')->nullable();
            $table->string('sumber_informasi')->nullable();
            $table->string('metode_pengumpulan')->nullable();
            $table->text('ikhtisar_informasi')->nullable();
            $table->string('jenis_dok_pabean')->nullable();
            $table->string('nomor_dok_pabean')->nullable();
            $table->date('tanggal_dok_pabean')->nullable();
            $table->string('metode_analisis')->nullable();
            $table->text('ikhtisar_analisis')->nullable();
            $table->string('jenis_pelanggaran')->nullable();
            $table->text('modus_pelanggaran')->nullable();
            $table->string('tempat_pelanggaran')->nullable();
            $table->date('waktu_pelanggaran')->nullable();
            $table->string('pelaku_type')->nullable();
            $table->integer('pelaku_id')->nullable();
            $table->string('dokumentasi_foto')->nullable();
            $table->string('dokumentasi_audio')->nullable();
            $table->string('dokumentasi_video')->nullable();
            $table->text('informasi_lain')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->string('kode_status')->index();
            $table->boolean('status_tindak_lanjut')->default(false)->index();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable()->index();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->index(['pelaku_type', 'pelaku_id']);
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
        Schema::dropIfExists($this->tableName);
    }
}
