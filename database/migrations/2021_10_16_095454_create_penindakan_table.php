<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penindakan', function (Blueprint $table) {
            $table->id();
			$table->integer('sprint_id')->index();
			$table->string('object_type')->nullable()->index();
			$table->string('object_id')->nullable()->index();
			$table->date('tanggal_penindakan')->nullable()->index();
			$table->integer('grup_lokasi_id')->nullable()->index();
			$table->string('lokasi_penindakan')->nullable()->index();
			$table->integer('saksi_id')->index();
			$table->integer('petugas1_id')->index();
			$table->integer('petugas2_id')->nullable()->index();
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
        Schema::dropIfExists('penindakan');
    }
}
