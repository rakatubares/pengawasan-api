<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenindakanSarkutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penindakan_sarkut', function (Blueprint $table) {
            $table->id();
			$table->integer('penindakan_id')->index();
			$table->string('nama_sarkut')->nullable()->index();
			$table->string('jenis_sarkut')->index();
			$table->string('nomor_sarkut')->nullable()->index();
			$table->string('jumlah_kapasitas')->nullable();
			$table->string('satuan_kapasitas')->nullable();
			$table->integer('pengemudi_id')->nullable()->index();
			$table->string('bendera_sarkut')->nullable()->index();
			$table->string('registrasi_sarkut')->nullable()->index();
            $table->timestamps();
			$table->softDeletes();
			$table->string('created_by')->nullable();
			$table->string('updated_by')->nullable();
			$table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('penindakan_sarkut');
    }
}
