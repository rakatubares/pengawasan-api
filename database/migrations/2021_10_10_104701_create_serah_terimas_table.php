<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerahTerimasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('serah_terimas', function (Blueprint $table) {
			$table->id();
			$table->string('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->string('no_sprint')->index();
			$table->date('tgl_sprint')->index();
			$table->boolean('detail_sarkut')->default(0)->index();
			$table->boolean('detail_barang')->default(0)->index();
			$table->boolean('detail_dokumen')->default(0)->index();
			$table->boolean('detail_badan')->default(0)->index();
			$table->string('nama_penerima')->index();
			$table->string('jns_identitas')->nullable()->index();
			$table->string('no_identitas')->nullable()->index();
			$table->string('atas_nama_penerima')->nullable()->index();
			$table->string('dalam_rangka')->nullable()->index();
			$table->string('pejabat')->index();
			$table->integer('kode_status')->index();
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
		Schema::dropIfExists('serah_terimas');
	}
}
