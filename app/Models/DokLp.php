<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'pasal',
		'modus',
		'kode_jabatan',
		'plh',
		'pejabat_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function lphp()
	{
		return $this->hasOneThrough(
			DokLphp::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lphp'
		)->where(
			'object2_type',
			'lp'
		);
	}

	/**
	 * Detail pejabat
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
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
