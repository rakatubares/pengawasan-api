<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_status', function (Blueprint $table) {
            $table->id();
			$table->string('historyable_type');
			$table->integer('historyable_id');
			$table->string('kode_status')->index();
			$table->text('keterangan')->nullable();
			$table->text('nip_pegawai')->nullable();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['historyable_type', 'historyable_id']);
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
        Schema::dropIfExists('riwayat_status');
    }
}