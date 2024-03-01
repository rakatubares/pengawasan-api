<?php

namespace App\Models\Intelijen;

use App\Models\DocumentsChain;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkhtisarInformasi extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'ikhtisar_informasi';

	protected $fillable = [
		'chain_id'
	];

	public function chain() {
		return $this->belongsTo(DocumentsChain::class, 'chain_id');
	}

	public function informasi()
	{
		return $this->hasMany(ItemInformasi::class, 'ikhtisar_id');
	}
}
