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

	/**
	 * LKAI
	 */
	public function lkai()
	{
		return $this->hasOneThrough(
			DokLkai::class,
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
			'lkai'
		);
	}

	/**
	 * The "booted" method of the model.
	 *
	 * @return void
	 */
	protected static function booted()
	{
		static::deleted(function ($intelijen) {
			// Delete ikhtisar
			$intelijen->ikhtisar()->delete();

			// Delete linked docs
			if ($intelijen->lppi != null) {
				$intelijen->lppi->delete();
			}
			if ($intelijen->lkai != null) {
				$intelijen->lkai->delete();
			}
		});
	}
}
