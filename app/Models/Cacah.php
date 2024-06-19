<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cacah extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'cacah';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tgl_dok',
		'tempat_cacah',
		'pejabat_st_id',
		'nomor_st',
		'tanggal_st',
		'tempat_penindakan',
		'tanggal_penindakan',
		'barang_penindakan',
		'tempat_penyimpanan',
		'petugas_penindakan_1_id',
		'petugas_penindakan_2_id',
		'petugas_penyidikan_1_id',
		'petugas_penyidikan_2_id',
		'kode_status'
	];

	protected $casts = [
		'tgl_dok' => 'date',
		'tanggal_st' => 'date',
		'tanggal_penindakan' => 'date',
	];

	public function petugas_penindakan_1()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas_penindakan_1_id', 'user_id');
	}

	public function petugas_penindakan_2()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas_penindakan_2_id', 'user_id');
	}

	public function petugas_penyidikan_1()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas_penyidikan_1_id', 'user_id');
	}

	public function petugas_penyidikan_2()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas_penyidikan_2_id', 'user_id');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
