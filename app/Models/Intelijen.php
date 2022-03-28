<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intelijen extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'intelijen';

	/**
	 * Ikhtisar informasi
	 */
	public function ikhtisar()
	{
		return $this->hasMany(IkhtisarInformasi::class, 'intelijen_id');
	}

	/**
	 * Dokumen
	 */
	public function dokumen()
	{
		return $this->hasMany(
			ObjectRelation::class, 
			'object1_id', 
			'id'
		)->where(
			'object1_type',
			'intelijen'
		);
	}

	/**
	 * LPPI
	 */
	public function lppi()
	{
		return $this->hasOneThrough(
			DokLppi::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'intelijen'
		)->where(
			'object2_type',
			'lppi'
		);
	}
}
