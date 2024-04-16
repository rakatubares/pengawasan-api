<?php

namespace App\Models;

use App\Models\References\RefJabatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sprint extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'sprint';

	protected $fillable = [
		'nomor_sprint',
		'tanggal_sprint',
		'pejabat_id',
	];

	protected $casts = [
		'tanggal_sprint' => 'date',
	];

	/**
	 * Pejabat SPRINT
	 */
	public function pejabat()
	{
		return $this->belongsTo(RefJabatan::class, 'pejabat_id');
	}
}
