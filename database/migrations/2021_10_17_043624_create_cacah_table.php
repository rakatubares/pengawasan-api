<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCacahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cacah', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->text('tempat_cacah');
			$table->integer('pejabat_st_id')->index();
			$table->string('nomor_st')->index();
			$table->date('tanggal_st')->index();
			$table->text('tempat_penindakan')->nullable();
			$table->date('tanggal_penindakan')->index();
			$table->text('barang_penindakan');
			$table->text('tempat_penyimpanan');
			$table->integer('petugas_penindakan_1_id')->index();
			$table->integer('petugas_penindakan_2_id')->nullable()->index();
			$table->integer('petugas_penyidikan_1_id')->nullable()->index();
			$table->integer('petugas_penyidikan_2_id')->nullable()->index();
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
        Schema::dropIfExists('cacah');
    }
}
