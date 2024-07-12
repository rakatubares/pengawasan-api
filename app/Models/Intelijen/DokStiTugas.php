<?php

namespace App\Models\Intelijen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokStiTugas extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_sti_tugas';

	protected $fillable = [
		'sti_id',
		'tugas',
	];

	public function sti()
	{
		return $this->belongsTo(DokSti::class, 'sti_id');
	}
}
