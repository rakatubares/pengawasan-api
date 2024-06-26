<?php

namespace App\Models\Penyidikan;

use App\Models\Entitas\EntitasOrang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyidikan extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'penyidikan';

	protected $fillable = [
		'chain_id',
		'jenis_pelanggaran',
		'pasal',
		'tempat_pelanggaran',
		'tanggal_pelanggaran',
		'waktu_pelanggaran',
		'modus',
		'pelaku_id',
		'tertangkap_tangan',
	];

	protected $casts = [
		'tanggal_pelanggaran' => 'date'
	];

	// Pelaku
	public function pelaku() {
		return $this->belongsTo(EntitasOrang::class, 'pelaku_id');
	}

	// BHP
	public function bhp() {
		return $this->hasOne(PenyidikanBhp::class, 'penyidikan_id');
	}
}
