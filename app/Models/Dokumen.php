<?php

namespace App\Models;

use App\Models\References\RefStatus;
use App\Models\References\RefTembusan;
use App\Traits\PetugasTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Dokumen extends Model
{
    use HasFactory;
	use PetugasTrait;
	use SoftDeletes;

	public $agendaDokumen = '/KPU.305/';

	protected $observables = ['editing', 'edited', 'booking', 'booked', 'publishing', 'published', 'amended'];
	public $unpublishedStatus = ['draft', 'booking-nomor', 'rollback'];

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

	public function book()
	{
		$this->fireModelEvent('booking');
		$this->update(['kode_status' => 'booking-nomor']);
		$this->fireModelEvent('booked');
	}

	public function publish()
	{
		$prePublishStatus = $this->kode_status;
		$this->fireModelEvent('publishing');
		$this->update(['kode_status' => 'terbit']);
		if (in_array($prePublishStatus, ['draft', 'booking-nomor'])) {
			$this->fireModelEvent('published');
		} else {
			$this->fireModelEvent('amended');
		}
	}

	public function rollback($remark=null)
	{
		// Rollback status
		$this->update(['kode_status' => 'rollback']);
		
		// Add history
		$this->status_history()
			->create([
				'kode_status' => 'rollback',
				'keterangan' => $remark,
				'nip_pegawai' => Auth::user()->nip
			]);
	}

	public function followedUp($status_name=null)
	{
		$status = $status_name != null ? $status_name : 'status_tindak_lanjut';
		$this->update([$status => true]);
	}
	
	public function unFollowedUp($status_name=null)
	{
		$status = $status_name != null ? $status_name : 'status_tindak_lanjut';
		$this->update([$status => false]);
	}
}
