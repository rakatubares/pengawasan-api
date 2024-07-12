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
			$table->morphs('attachable');
			$table->string('mime_type');
			$table->string('path')->index();
			$table->string('filename')->index();
			$table->string('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
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
