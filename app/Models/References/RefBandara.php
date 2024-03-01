<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefBandara extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_bandara';

	public $timestamps = true;

	/**
	 * Detail negara
	 */
	public function negara()
	{
		return $this->belongsTo(RefNegara::class, 'country', 'kode_2');
	}
}
