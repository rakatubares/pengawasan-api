<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLppiInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_lppi_informasi', function (Blueprint $table) {
            $table->id();
			$table->morphs('infoable');
			$table->text('informasi');
			$table->string('kode_kepercayaan')->index();
			$table->integer('kode_validitas')->index();
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
        Schema::dropIfExists('dok_lppi_informasi');
    }
}
