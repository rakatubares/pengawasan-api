<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_li', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->string('sumber')->index();
			$table->text('informasi');
			$table->text('tindak_lanjut')->nullable();
			$table->text('catatan')->nullable();
			$table->string('kode_jabatan_penerbit')->index();
			$table->boolean('plh_penerbit')->nullable()->index();
			$table->integer('penerbit_id')->index();
			$table->string('kode_jabatan_atasan')->index();
			$table->boolean('plh_atasan')->nullable()->index();
			$table->integer('atasan_id')->index();
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
        Schema::dropIfExists('dok_li');
    }
}
