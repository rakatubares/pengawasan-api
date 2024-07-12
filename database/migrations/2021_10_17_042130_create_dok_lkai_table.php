<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLkaiTable extends Migration
{
	protected $tableName = 'dok_lkai';
	protected $kodeLpti = 'lpti';
	protected $kodeNpi = 'npi';
	protected $kodeNhi = 'nhi';
	protected $kodeNi = 'ni';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tableName, function (Blueprint $table) {
			$table->id();
			$table->integer('no_dok')->nullable()->index();
			$table->string('agenda_dok')->index();
			$table->integer('thn_dok')->nullable()->index();
			$table->string('no_dok_lengkap')->index();
			$table->date('tanggal_dokumen')->nullable()->index();
			$table->integer('chain_id')->index();
			$table->string('nomor_'.$this->kodeLpti)->nullable()->index();
			$table->date('tanggal_'.$this->kodeLpti)->nullable()->index();
			$table->string('nomor_'.$this->kodeNpi)->nullable()->index();
			$table->date('tanggal_'.$this->kodeNpi)->nullable()->index();
			$table->text('informasi')->nullable();
			$table->text('prosedur')->nullable();
			$table->text('hasil')->nullable();
			$table->text('kesimpulan')->nullable();
			$table->boolean('flag_rekom_'.$this->kodeNhi)->index();
			$table->boolean('flag_rekom_'.$this->kodeNi)->index();
			$table->text('rekomendasi_lain')->nullable();
			if ($this->tableName == 'dok_lkai') {
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
			$table->boolean('status_tindak_lanjut')->default(false)->index();
            $table->timestamps();
			$table->softDeletes();
			$table->string('created_by')->nullable()->index();
			$table->string('updated_by')->nullable();
			$table->string('deleted_by')->nullable();
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
		Schema::dropIfExists($this->tableName);
	}
}
