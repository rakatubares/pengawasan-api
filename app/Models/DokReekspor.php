<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokReekspor extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_reekspor';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'jenis_dok_asal',
		'nomor_dok_asal',
		'tanggal_dok_asal',
		'jenis_dok_ekspor',
		'nomor_dok_ekspor',
		'tanggal_dok_ekspor',
		'nomor_mawb',
		'tanggal_mawb',
		'nomor_hawb',
		'tanggal_hawb',
		'nama_sarkut',
		'nomor_flight',
		'tanggal_flight',
		'nomor_reg_sarkut',
		'kedapatan',
		'saksi_id',
		'petugas1_id',
		'petugas2_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_dok_asal' => 'date',
		'tanggal_dok_ekspor' => 'date',
		'tanggal_mawb' => 'date',
		'tanggal_hawb' => 'date',
		'tanggal_flight' => 'date',
	];

	public function saksi()
	{
		return $this->belongsTo(RefEntitas::class, 'saksi_id');
	}

	public function petugas1()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas1_id', 'user_id');
	}

	public function petugas2()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas2_id', 'user_id');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
