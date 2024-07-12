<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RefUserCache extends Authenticatable
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
		'jabatan',
		'status',
	];

	public $timestamps = true;
}
