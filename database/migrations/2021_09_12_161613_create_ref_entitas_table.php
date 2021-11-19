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
			$table->string('jenis_entitas')->index();
			$table->string('nama')->index();
			$table->string('jenis_kelamin')->nullable()->index();
			$table->date('tanggal_lahir')->nullable()->index();
			$table->string('warga_negara')->nullable()->index();
			$table->string('jenis_identitas')->nullable()->index();
			$table->string('nomor_identitas')->nullable()->index();
			$table->string('pekerjaan')->nullable()->index();
			$table->string('alamat')->nullable()->index();
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
        Schema::dropIfExists('ref_entitas');
    }
}
