<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLkaiTable extends Migration
{
	public function __construct()
	{
		$this->table_name = 'dok_lkai';
		$this->kode_lpti = 'lpti';
		$this->kode_npi = 'npi';
		$this->kode_nhi = 'nhi';
		$this->kode_ni = 'ni';
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->table_name, function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->string('nomor_'.$this->kode_lpti)->nullable()->index();
			$table->date('tanggal_'.$this->kode_lpti)->nullable()->index();
			$table->string('nomor_'.$this->kode_npi)->nullable()->index();
			$table->date('tanggal_'.$this->kode_npi)->nullable()->index();
			$table->text('informasi')->nullable();
			$table->text('prosedur')->nullable();
			$table->text('hasil')->nullable();
			$table->text('kesimpulan')->nullable();
			$table->boolean('flag_rekom_'.$this->kode_nhi)->index();
			$table->boolean('flag_rekom_'.$this->kode_ni)->index();
			$table->text('rekomendasi_lain')->nullable();
			if ($this->table_name == 'dok_lkai') {
				$table->text('informasi_lain')->nullable();
			}
			$table->string('tujuan')->nullable();
			$table->boolean('keputusan_pejabat');
			$table->text('catatan_pejabat')->nullable();
			$table->date('tanggal_terima_pejabat')->nullable();
			$table->boolean('keputusan_atasan');
			$table->text('catatan_atasan')->nullable();
			$table->date('tanggal_terima_atasan')->nullable();
			$table->string('kode_status')->index();
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
		Schema::dropIfExists($this->table_name);
	}
}
