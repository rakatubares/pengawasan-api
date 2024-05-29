<?php

namespace App\Models;

use App\Models\References\RefStatus;
use App\Models\References\RefTembusan;
use App\Traits\PetugasTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use HasFactory;
	use PetugasTrait;
	use SoftDeletes;

	public $agenda_dokumen = '/KPU.305/';

	protected $observables = ['editing', 'edited', 'publishing', 'published'];
	public $unpublished_status = ['draft'];

	/**
	 * Documents chain
	 */
	public function chain() {
		return $this->belongsTo(DocumentsChain::class, 'chain_id');
	}

	/**
	 * Petugas
	 */
	public function detail_petugas()
	{
		return $this->morphMany(DetailPetugas::class, 'officerable');
	}

	/**
	 * Tembusan
	 */
	public function tembusan() 
	{
		return $this->morphToMany(RefTembusan::class, 'cc_able', 'tembusan', 'cc_able_id', 'tembusan_id')
			->wherePivotNull('deleted_at')
			->orderByPivot('no_urut')
			->withTimestamps();
	}

	/**
	 * Current status
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}

	/**
	 * User
	 */
	public function creator() {
		return $this->hasOne(RefUserCache::class, 'nip', 'created_by');
	}

	/**
	 * Riwayat status dokumen
	 */
	public function status_history() 
	{
		return $this->morphMany(RiwayatStatus::class, 'historyable');
	}

	public function edit($data) 
	{
		$this->fireModelEvent('editing');
		$this->update($data);
		$this->fireModelEvent('edited');
	}

	public function publish() 
	{
		$this->fireModelEvent('publishing');
		$this->update(['kode_status' => 'terbit']);
		$this->fireModelEvent('published');
	}

	public function followedUp() 
	{
		$this->update(['kode_status' => 'tindak-lanjut']);
	}
	public function unFollowedUp() 
	{
		$this->update(['kode_status' => 'terbit']);
	}
}
