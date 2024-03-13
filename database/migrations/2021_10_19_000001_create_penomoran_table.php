<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenomoranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penomoran', function (Blueprint $table) {
            $table->id();
			$table->string('tipe_dokumen');
			$table->string('agenda');
			$table->integer('tahun');
			$table->integer('nomor_terakhir');
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['tipe_dokumen', 'agenda', 'tahun']);
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
        Schema::dropIfExists('penomoran');
    }
}
