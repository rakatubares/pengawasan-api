<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLptiNTable extends Migration
{
    protected $tableName = 'dok_lptin';

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
            $table->string('nomor_st')->nullable()->index();
            $table->date('tanggal_st')->nullable()->index();
            $table->string('wilayah')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->text('uraian')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->string('kode_status')->index();
            $table->boolean('status_tindak_lanjut')->default(false)->index();
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
        Schema::dropIfExists($this->tableName);
    }
}
