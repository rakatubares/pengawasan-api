<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingSbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_sbp', function (Blueprint $table) {
            $table->id();
			$table->integer('no_dok');
			$table->string('agenda_dok');
			$table->integer('thn_dok');
			$table->string('no_dok_lengkap')->index();
			$table->date('tgl_dok')->index();
			$table->string('nama_pemilik');
			$table->string('no_identitas');
			$table->text('catatan')->nullable();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['no_dok', 'thn_dok']);
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
        Schema::dropIfExists('tracking_sbp');
    }
}
