<?php

namespace App\Models\Penindakan;

use App\Models\Entitas\EntitasOrang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenindakanBangunan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penindakan_bangunan';

	protected $fillable = [
		'penindakan_id',
		'alamat',
		'no_reg',
		'pemilik_id',
	];

	/**
	 * Parent penindakan
	 */
	public function penindakan()
	{
		return $this->belongsTo(Penindakan::class, 'penindakan_id');
	}

	/**
	 * Detail entitas pemilik
	 */
	public function pemilik()
	{
		return $this->belongsTo(EntitasOrang::class, 'pemilik_id');
	}
}
