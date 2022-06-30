<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNhiN extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_nhin';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'sifat',
		'klasifikasi',
		'tujuan',
		'tempat_indikasi',
		'waktu_indikasi',
		'zona_waktu',
		'kd_kantor',
		'flag_exim',
		'jenis_dok_exim',
		'nomor_dok_exim',
		'tanggal_dok_exim',
		'nama_sarkut_exim',
		'no_flight_trayek_exim',
		'nomor_awb_exim',
		'tanggal_awb_exim',
		'merek_koli_exim',
		'importir_ppjk',
		'npwp',
		'id_barang_exim',
		'data_lain_exim',
		'flag_sarkut',
		'nama_sarkut',
		'jenis_sarkut',
		'no_flight_trayek_sarkut',
		'pelabuhan_asal_sarkut',
		'pelabuhan_tujuan_sarkut',
		'imo_mmsi_sarkut',
		'data_lain_sarkut',
		'flag_orang',
		'entitas_id',
		'flight_voyage_orang',
		'pelabuhan_asal_orang',
		'pelabuhan_tujuan_orang',
		'waktu_berangkat_orang',
		'waktu_datang_orang',
		'data_lain_orang',
		'indikasi',
		'kode_jabatan',
		'plh_pejabat',
		'pejabat_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'waktu_indikasi' => 'datetime',
		'tanggal_dok_exim' => 'date',
		'tanggal_awb_exim' => 'date',
		'waktu_berangkat_orang' => 'datetime',
		'waktu_datang_orang' => 'datetime',
	];

	public function intelijen()
	{
		return $this->hasOneThrough(
			Intelijen::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'intelijen'
		)->where(
			'object2_type',
			'nhin'
		);
	}

	/**
	 * Detail kantor
	 */
	public function kantor_bc()
	{
		return $this->belongsTo(RefKantorBC::class, 'kd_kantor', 'kd_kantor');
	}

	/**
	 * Detail Barang
	 */
	public function barang_exim()
	{
		return $this->hasOne(DetailBarang::class, 'id', 'id_barang_exim');
	}

	/**
	 * Detail pelabuhan
	 */
	public function asal_sarkut()
	{
		return $this->belongsTo(RefBandara::class, 'pelabuhan_asal_sarkut', 'iata_code');
	}

	public function tujuan_sarkut()
	{
		return $this->belongsTo(RefBandara::class, 'pelabuhan_tujuan_sarkut', 'iata_code');
	}

	public function asal_orang()
	{
		return $this->belongsTo(RefBandara::class, 'pelabuhan_asal_orang', 'iata_code');
	}

	public function tujuan_orang()
	{
		return $this->belongsTo(RefBandara::class, 'pelabuhan_tujuan_orang', 'iata_code');
	}

	/**
	 * Detail orang
	 */
	public function orang()
	{
		return $this->belongsTo(RefEntitas::class, 'entitas_id');
	}

	/**
	 * Detail penerbit
	 */
	public function pejabat()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat_id');
	}

	public function jabatan()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan', 'kode');
	}

	/**
	 * Uraian status
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}

	/**
	 * Uraian tembusan
	 */
	public function tembusan()
	{
		return $this->morphToMany(RefTembusan::class, 'cc_able', 'tembusan', 'cc_able_id', 'tembusan_id')
			->wherePivotNull('deleted_at')
			->orderByPivot('no_urut')
			->withTimestamps();
	}
}
