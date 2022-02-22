<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLptp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lptp';
	protected $tipe_lptp = 'lptp';
	protected $tipe_sbp = 'sbp';
	protected $tipe_lphp = 'lphp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'alasan_tidak_penindakan',
		'jabatan_atasan',
		'plh',
		'atasan_id',
		'kode_status'
	];

	public function sbp()
	{
		return $this->hasOneThrough(
			DokSbp::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			$this->tipe_sbp
		)->where(
			'object2_type',
			$this->tipe_lptp
		);
	}

	public function lphp()
	{
		return $this->hasOneThrough(
			DokLphp::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			$this->tipe_lptp
		)->where(
			'object2_type',
			$this->tipe_lphp
		);
	}

	/**
	 * Detail atasan
	 */
	public function atasan()
	{
		return $this->belongsTo(RefUserCache::class, 'atasan_id');
	}

	public function jabatan()
	{
		return $this->belongsTo(RefJabatan::class, 'jabatan_atasan', 'kode');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
