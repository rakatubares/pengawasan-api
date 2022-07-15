<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNi extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_ni';
	protected $tipe_ni = 'ni';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'sifat',
		'klasifikasi',
		'tujuan',
		'uraian',
		'kode_jabatan',
		'plh_pejabat',
		'pejabat_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
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
			$this->tipe_ni
		);
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
