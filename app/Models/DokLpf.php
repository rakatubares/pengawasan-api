<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLpf extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lpf';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'saksi_id',
		'tanggal_bap_saksi',
		'tersangka_id',
		'tanggal_bap_tersangka',
		'resume_perkara',
		'tanggal_resume_perkara',
		'jenis_dokumen_lain',
		'nomor_dokumen_lain',
		'tanggal_dokumen_lain',
		'kesimpulan',
		'usulan',
		'catatan',
		'peneliti_id',
		'kode_jabatan1',
		'plh1',
		'pejabat1_id',
		'kode_jabatan2',
		'plh2',
		'pejabat2_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_bap_saksi' => 'date',
		'tanggal_bap_tersangka' => 'date',
		'tanggal_resume_perkara' => 'date',
		'tanggal_dokumen_lain' => 'date',
	];

	/**
	 * Relation to LPP
	 */
	public function lpp()
	{
		return $this->hasOneThrough(
			DokLpp::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lpp'
		)->where(
			'object2_type',
			'lpf'
		);
	}

	/**
	 * Detail orang saksi
	 */
	public function saksi()
	{
		return $this->belongsTo(RefEntitas::class, 'saksi_id');
	}

	/**
	 * Detail orang tersangka
	 */
	public function tersangka()
	{
		return $this->belongsTo(RefEntitas::class, 'tersangka_id');
	}

	/**
	 * Detail petugas
	 */
	public function peneliti()
	{
		return $this->belongsTo(RefUserCache::class, 'peneliti_id');
	}

	public function pejabat1()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat1_id');
	}

	public function jabatan1()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan1', 'kode');
	}

	public function pejabat2()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat2_id');
	}

	public function jabatan2()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan2', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
