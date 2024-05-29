<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsChainTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents_chain', function (Blueprint $table) {
			$table->id();
			$table->string('latest_document')->nullable()->index();
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
		Schema::dropIfExists('documents_chain');
	}
}
