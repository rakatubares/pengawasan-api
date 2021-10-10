<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbpPenindakanSarkutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbp_penindakan_sarkuts', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('sbp_id');
			$table->foreign('sbp_id')
				->references('id')
				->on('sbp_headers')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('nama_sarkut')->index();
			$table->string('jenis_sarkut')->index();
			$table->string('no_flight_trayek')->nullable()->index();
			$table->string('kapasitas')->nullable();
			$table->string('satuan_kapasitas')->nullable()->index();
			$table->string('nama_pilot_pengemudi')->nullable()->index();
			$table->string('bendera')->nullable()->index();
			$table->string('no_reg_polisi')->nullable()->index();
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
        Schema::dropIfExists('sbp_penindakan_sarkuts');
    }
}
