<?php

namespace App\Models;

use App\Models\Intelijen\DokLkai;
use App\Models\Intelijen\DokLkaiN;
use App\Models\Intelijen\DokLppi;
use App\Models\Intelijen\DokLppiN;
use App\Models\Intelijen\DokNhi;
use App\Models\Intelijen\DokNhiN;
use App\Models\Intelijen\DokNi;
use App\Models\Intelijen\DokNiN;
use App\Models\Penindakan\DokBukaSegel;
use App\Models\Penindakan\DokLap;
use App\Models\Penindakan\DokLi;
use App\Models\Penindakan\DokLp;
use App\Models\Penindakan\DokLphp;
use App\Models\Penindakan\DokLptp;
use App\Models\Penindakan\DokPengaman;
use App\Models\Penindakan\DokRiksa;
use App\Models\Penindakan\DokRiksaBadan;
use App\Models\Penindakan\DokSbp;
use App\Models\Penindakan\DokSegel;
use App\Models\Penindakan\DokTegah;
use App\Models\Penindakan\DokTolakSbp1;
use App\Models\Penindakan\DokTolakSbp2;
use App\Models\Penindakan\Penindakan;
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
	public $doc_types = [
		'lppi', 'lkai', 'nhi', 'ni',
		'lppin', 'lkain', 'nhin', 'nin',
		'li', 'lap', 
		'riksa_badan', 'riksa', 'tegah', 'segel', 'buka_segel',
		'sbp', 'tolak1', 'tolak2', 'lptp', 'lphp', 'lp',
		'pengaman',
	];

	public function status() {
		return $this->belongsTo(RefKodeDokumen::class, 'latest_document', 'kode_dokumen');
	}

	/**
	 * Intelijen
	 */
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

	public function lppin() {
		return $this->hasOne(DokLppiN::class,'chain_id');
	}

	public function lkain() {
		return $this->hasOne(DokLkaiN::class,'chain_id');
	}

	public function nhin() {
		return $this->hasOne(DokNhiN::class, 'chain_id');
	}

	public function nin() {
		return $this->hasOne(DokNiN::class, 'chain_id');
	}

	/**
	 * Penindakan
	 */
	public function penindakan() {
		return $this->hasOne(Penindakan::class, 'chain_id');
	}
	
	 public function li() {
		return $this->hasOne(DokLi::class, 'chain_id');
	}

	public function lap() {
		return $this->hasOne(DokLap::class, 'chain_id');
	}

	public function riksa_badan() {
		return $this->hasOne(DokRiksaBadan::class, 'chain_id');
	}

	public function riksa() {
		return $this->hasOne(DokRiksa::class, 'chain_id');
	}

	public function tegah() {
		return $this->hasOne(DokTegah::class, 'chain_id');
	}

	public function segel() {
		return $this->hasOne(DokSegel::class, 'chain_id');
	}

	public function buka_segel() {
		return $this->hasOne(DokBukaSegel::class, 'chain_id');
	}

	public function sbp() {
		return $this->hasOne(DokSbp::class, 'chain_id');
	}

	public function tolak1() {
		return $this->hasOneThrough(
			DokTolakSbp1::class, 
			DokSbp::class,
			'chain_id',
			'parent_id',
			'id',
			'id',
		)->where('parent_type', 'sbp');
	}

	public function tolak2() {
		$tolak1 = new DokTolakSbp1();
		$tolak2 = new DokTolakSbp2();

		$tolak1_table = $tolak1->getTable();
		$tolak2_table = $tolak2->getTable();

		return $this->tolak1()
			->join($tolak2_table, $tolak2_table.'.tolak1_id', '=', $tolak1_table.'.id')
			->select($tolak2_table.'.*');
	}

	public function lptp() {
		return $this->hasOne(DokLptp::class, 'chain_id');
	}

	public function lphp() {
		return $this->hasOne(DokLphp::class, 'chain_id');
	}

	public function lp() {
		return $this->hasOne(DokLp::class, 'chain_id');
	}

	public function pengaman() {
		return $this->hasOne(DokPengaman::class, 'chain_id');
	}
}
