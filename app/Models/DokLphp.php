<?php

namespace App\Models;

use App\Traits\SwitcherTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLphp extends Model
{
	use HasFactory;
	use SoftDeletes;
	use SwitcherTrait;

	protected $table = 'dok_lphp';
	protected $tipe_lptp = 'lptp';
	protected $tipe_lphp = 'lphp';
	protected $tipe_lp = 'lp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'analisa',
		'catatan',
		'kode_jabatan_penyusun',
		'plh_penyusun',
		'penyusun_id',
		'kode_jabatan_atasan',
		'plh_atasan',
		'atasan_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function lp_relation()
	{
		return $this->hasOne(
			ObjectRelation::class, 
			'object1_id'
		)->where(
			'object1_type',
			$this->tipe_lphp
		)->where(
			'object2_type', 
			$this->tipe_lp
		);
	}

	public function lptp()
	{
		$lptp_model = $this->switchObject($this->tipe_lptp, 'model');

		return $this->hasOneThrough(
			$lptp_model,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			$this->tipe_lptp
		)->where(
			'object2_type',
			$this->tipe_lphp
		);
	}

	public function lp()
	{
		$lp_model = $this->switchObject($this->tipe_lp, 'model');

		return $this->hasOneThrough(
			$lp_model,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			$this->tipe_lphp
		)->where(
			'object2_type',
			$this->tipe_lp
		);
	}

	/**
	 * Detail pejabat
	 */
	public function penyusun()
	{
		return $this->belongsTo(RefUserCache::class, 'penyusun_id');
	}

	public function jabatan_penyusun()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_penyusun', 'kode');
	}

	public function atasan()
	{
		return $this->belongsTo(RefUserCache::class, 'atasan_id');
	}

	public function jabatan_atasan()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_atasan', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
