<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penomoran extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penomoran';

	protected $fillable = [
		'tipe_dokumen',
		'tahun',
		'kode_dokumen',
		'agenda',
		'nomor_terakhir',
	];
}
