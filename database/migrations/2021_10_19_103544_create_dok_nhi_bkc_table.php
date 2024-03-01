<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokNhiBkcTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dok_nhi_bkc', function (Blueprint $table) {
			$table->id();
			$table->string('tempat_penimbunan')->nullable();
			$table->string('penyalur')->nullable();
			$table->string('tempat_penjualan')->nullable();
			$table->string('nppbkc')->nullable();
			$table->string('nama_sarkut')->nullable();
			$table->string('no_flight_trayek')->nullable();
			$table->text('data_lain')->nullable();
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
		Schema::dropIfExists('dok_nhi_bkc');
	}
}
