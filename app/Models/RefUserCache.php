<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefUserCache extends Model
{
    use HasFactory;

	protected $table = 'ref_user_cache';

	protected $fillable = [
		'user_id',
		'username',
		'name',
		'nip',
		'pangkat',
		'penempatan',
		'pejabat',
		'status'
	];

	protected $primaryKey = 'user_id';

	public $timestamps = true;
}
