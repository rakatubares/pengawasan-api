<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segels', function (Blueprint $table) {
            $table->id();
			$table->string('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->string('no_sprint')->index();
			$table->date('tgl_sprint')->index();
			$table->boolean('detail_sarkut')->default(0)->index();
			$table->boolean('detail_barang')->default(0)->index();
			$table->boolean('detail_bangunan')->default(0)->index();
			$table->string('jenis_segel')->index();
			$table->integer('jumlah_segel');
			$table->string('nomor_segel')->nullable()->index();
			$table->string('lokasi_segel')->nullable()->index();
			$table->string('nama_pemilik')->index();
			$table->string('alamat_pemilik')->nullable()->index();
			$table->string('pekerjaan_pemilik')->nullable()->index();
			$table->string('jns_identitas')->nullable()->index();
			$table->string('no_identitas')->nullable()->index();
			$table->string('pejabat1')->index();
			$table->string('pejabat2')->nullable()->index();
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
        Schema::dropIfExists('segels');
    }
}
