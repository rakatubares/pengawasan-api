<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackingSbp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'tracking_sbp';

	protected $casts = [
		'tgl_dok' => 'date',
	];

	/**
	 * Files attachment
	 */
	public function attachment()
	{
		return $this->morphMany(Lampiran::class, 'attachable');
	}
}
