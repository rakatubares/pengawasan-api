<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokBast extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_bast';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'object_type',
		'object_id',
		'yang_menerima_type',
		'yang_menerima_id',
		'atas_nama_yang_menerima',
		'yang_menyerahkan_type',
		'yang_menyerahkan_id',
		'atas_nama_yang_menyerahkan',
		'dalam_rangka',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Define polymorphic properties
	 */
	public function objectable()
	{
		return $this->morphTo(__FUNCTION__, 'object_type', 'object_id');
	}

	public function yang_menerima()
	{
		return $this->morphTo(__FUNCTION__, 'yang_menerima_type', 'yang_menerima_id');
	}
	
	public function yang_menyerahkan()
	{
		return $this->morphTo(__FUNCTION__, 'yang_menyerahkan_type', 'yang_menyerahkan_id');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
