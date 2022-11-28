<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiranTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lampiran', function (Blueprint $table) {
			$table->id();
			$table->string('mime_type');
			$table->string('path')->index();
			$table->string('filename')->index();
			$table->string('description')->nullable();
			$table->string('attachable_type');
			$table->integer('attachable_id');
			$table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index(['attachable_type', 'attachable_id']);
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
		Schema::dropIfExists('lampiran');
	}
}
