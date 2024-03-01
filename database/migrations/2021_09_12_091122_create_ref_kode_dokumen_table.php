<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefKodeDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_kode_dokumen', function (Blueprint $table) {
            $table->id();
			$table->string('kode_dokumen')->unique();
			$table->string('short_title');
			$table->string('title');
			$table->string('group')->index();
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
        Schema::dropIfExists('ref_kode_dokumen');
    }
}
