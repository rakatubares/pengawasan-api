<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLapTable extends Migration
{
	public function __construct()
	{
		$this->table_name = 'dok_lap';
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
			$table->string('jenis_sumber')->index();
			$table->string('nomor_sumber')->index();
			$table->date('tanggal_sumber')->index();
			$table->integer('dugaan_pelanggaran_id')->index();
			$table->boolean('flag_pelaku')->index();
			$table->text('keterangan_pelaku')->nullable();
			$table->boolean('flag_pelanggaran')->index();
			$table->text('keterangan_pelanggaran')->nullable();
			$table->boolean('flag_locus')->index();
			$table->text('keterangan_locus')->nullable();
			$table->boolean('flag_tempus')->index();
			$table->text('keterangan_tempus')->nullable();
			$table->boolean('flag_kewenangan')->index();
			$table->text('keterangan_kewenangan')->nullable();
			$table->boolean('flag_sdm')->index();
			$table->text('keterangan_sdm')->nullable();
			$table->boolean('flag_sarpras')->index();
			$table->text('keterangan_sarpras')->nullable();
			$table->boolean('flag_anggaran')->index();
			$table->text('keterangan_anggaran')->nullable();
			$table->boolean('flag_layak_penindakan')->index();
			$table->integer('skema_penindakan_id')->nullable()->index();
			$table->text('keterangan_skema_penindakan')->nullable();
			$table->boolean('flag_layak_patroli')->nullable()->index();
			$table->text('keterangan_patroli')->nullable();
			$table->text('kesimpulan')->nullable();
			$table->string('kode_jabatan_penerbit')->index();
			$table->boolean('plh_penerbit')->nullable()->index();
			$table->integer('penerbit_id')->index();
			$table->string('kode_jabatan_atasan')->index();
			$table->boolean('plh_atasan')->nullable()->index();
			$table->integer('atasan_id')->index();
			$table->integer('kode_status')->nullable()->index();
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
