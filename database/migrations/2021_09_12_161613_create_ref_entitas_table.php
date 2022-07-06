<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefEntitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_entitas', function (Blueprint $table) {
            $table->id();
			$table->string('nama')->index();
			$table->string('alias')->nullable()->index();
			$table->string('jenis_kelamin')->nullable()->index();
			$table->string('tempat_lahir')->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->string('kd_warga_negara')->nullable()->index();
			$table->string('agama')->nullable();
			$table->string('jenis_identitas')->nullable()->index();
			$table->string('nomor_identitas')->nullable()->index();
			$table->string('penerbit_identitas')->nullable();
			$table->string('tempat_identitas_terbit')->nullable();
			$table->text('alamat_identitas')->nullable();
			$table->text('alamat_tinggal')->nullable();
			$table->string('pekerjaan')->nullable();
			$table->string('nomor_telepon')->nullable()->index();
			$table->string('email')->nullable()->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('ref_entitas');
    }
}
