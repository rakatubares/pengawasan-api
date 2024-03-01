<?php

namespace App\Models;

use App\Models\Intelijen\DokLkai;
use App\Models\Intelijen\DokLppi;
use App\Models\Intelijen\DokNhi;
use App\Models\Intelijen\DokNi;
use App\Models\Intelijen\IkhtisarInformasi;
use App\Models\References\RefKodeDokumen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentsChain extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'documents_chain';
	protected $fillable = ['latest_document'];
	public $doc_types = ['lppi', 'lkai', 'nhi', 'ni'];

	public function status() {
		return $this->belongsTo(RefKodeDokumen::class, 'latest_document', 'kode_dokumen');
	}

	public function ikhtisar_informasi() {
		return $this->hasOne(IkhtisarInformasi::class, 'chain_id');
	}

	public function lppi() {
		return $this->hasOne(DokLppi::class,'chain_id');
	}

	public function lkai() {
		return $this->hasOne(DokLkai::class, 'chain_id');
	}

	public function nhi() {
		return $this->hasOne(DokNhi::class, 'chain_id');
	}

	public function ni() {
		return $this->hasOne(DokNi::class, 'chain_id');
	}
}
