<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

<<<<<<< HEAD:app/Models/DokBukaSegel.php
class DokBukaSegel extends Model
=======
class DokTegah extends Model
>>>>>>> penindakan/sbp:app/Models/DokTegah.php
{
    use HasFactory;
	use SoftDeletes;

<<<<<<< HEAD:app/Models/DokBukaSegel.php
	protected $table = 'dok_buka_segel';
=======
	protected $table = 'dok_tegah';
>>>>>>> penindakan/sbp:app/Models/DokTegah.php

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'tanggal_dokumen',
		'no_dok_lengkap',
<<<<<<< HEAD:app/Models/DokBukaSegel.php
		'sprint_id',
		'jenis_segel',
		'jumlah_segel',
		'satuan_segel',
		'nomor_segel',
		'tanggal_segel',
		'tempat_segel',
		'saksi_id',
		'petugas1_id',
		'petugas2_id',
=======
>>>>>>> penindakan/sbp:app/Models/DokTegah.php
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_segel' => 'date'
	];

	public function penindakan()
	{
		return $this->hasOneThrough(
			Penindakan::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'penindakan'
		)->where(
			'object2_type',
<<<<<<< HEAD:app/Models/DokBukaSegel.php
			'bukasegel'
		);
	}

=======
			'tegah'
		);
	}

	public function sarkut()
	{
		return $this->morphOne(DetailSarkut::class, 'parent');
	}

	public function barang()
	{
		return $this->morphOne(DetailBarang::class, 'parent');
	}

	public function itemBarang()
	{
		return $this->hasManyThrough(
			DetailBarangItem::class,
			DetailBarang::class,
			'parent_id',
			'detail_barang_id'
		)->where('parent_type', Tegah::class);
	}

>>>>>>> penindakan/sbp:app/Models/DokTegah.php
	public function sprint()
	{
		return $this->belongsTo(RefSprint::class, 'sprint_id');
	}

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

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
