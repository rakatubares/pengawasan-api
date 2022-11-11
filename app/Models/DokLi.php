<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLi extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_li';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'sumber',
		'informasi',
		'tindak_lanjut',
		'catatan',
		'kode_jabatan_penerbit',
		'plh_penerbit',
		'penerbit_id',
		'kode_jabatan_atasan',
		'plh_atasan',
		'atasan_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

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
			'li'
		)->where(
			'object2_type',
			'lap'
		);
	}

	/**
	 * Detail pejabat
	 */
	public function penerbit()
	{
		return $this->belongsTo(RefUserCache::class, 'penerbit_id');
	}

	public function jabatan_penerbit()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_penerbit', 'kode');
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
