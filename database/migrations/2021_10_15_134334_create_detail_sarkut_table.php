<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSarkutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sarkut', function (Blueprint $table) {
            $table->id();
			$table->string('nama_sarkut')->nullable()->index();
			$table->string('jenis_sarkut')->index();
			$table->string('no_flight_trayek')->nullable()->index();
			$table->string('jumlah_kapasitas')->nullable();
			$table->string('satuan_kapasitas')->nullable();
			$table->integer('pilot_id')->nullable()->index();
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
        Schema::dropIfExists('detail_sarkut');
    }
}
