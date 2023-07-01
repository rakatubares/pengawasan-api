<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNhi extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_nhi';

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
		'kantor',
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
		'data_lain_exim',
		'flag_bkc',
		'tempat_penimbunan',
		'penyalur',
		'tempat_penjualan',
		'nppbkc',
		'nama_sarkut_bkc',
		'no_flight_trayek_bkc',
		'data_lain_bkc',
		'flag_tertentu',
		'jenis_dok_tertentu',
		'nomor_dok_tertentu',
		'tanggal_dok_tertentu',
		'nama_sarkut_tertentu',
		'no_flight_trayek_tertentu',
		'nomor_awb_tertentu',
		'tanggal_awb_tertentu',
		'merek_koli_tertentu',
		'importir_ppjk',
		'npwp',
		'data_lain_tertentu',
		'barang_id',
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
		'tanggal_dok_tertentu' => 'date',
		'tanggal_awb_tertentu' => 'date',
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
			'nhi'
		);
	}

	/**
	 * Relation to LAP object
	 */
	public function lap()
	{
		return $this->hasOneThrough(
			DokLap::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'nhi'
		)->where(
			'object2_type',
			'lap'
		);
	}

	/**
	 * Detail Barang
	 */
	public function objectable()
	{
		return $this->hasOne(DetailBarang::class, 'id', 'barang_id');
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
