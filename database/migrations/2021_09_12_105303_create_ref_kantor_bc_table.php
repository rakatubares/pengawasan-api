<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefKantorBCTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_kantor_bc', function (Blueprint $table) {
			$table->id();
			$table->integer('tipe')->nullable()->index();
			$table->integer('level')->nullable()->index();
			$table->string('parent')->nullable()->index();
			$table->string('kd_kantor')->index();
			$table->string('nama_kantor')->index();
			$table->boolean('active')->index()->default(true);
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
		Schema::dropIfExists('ref_kantor_bc');
	}
}
