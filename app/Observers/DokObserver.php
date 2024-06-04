<?php

namespace App\Observers;

use App\Models\Penomoran;
use App\Traits\DocumentsChainTrait;
use App\Traits\DocumentTrait;
use Illuminate\Support\Facades\Auth;

class DokObserver
{
	use DocumentTrait;
	use DocumentsChainTrait;

	protected function setDefaultDocumentProperties($dokumen) {
		$no_dok_lengkap = $dokumen->tipe_dokumen . '-' . '      ' . $dokumen->agenda_dokumen . $dokumen->thn_dok;
		$dokumen['agenda_dok'] = $dokumen->agenda_dokumen;
		$dokumen['no_dok_lengkap'] = $no_dok_lengkap;
		$dokumen['kode_status'] = 'draft';
	}

	protected function getNewDocumentNumber($dokumen) 
	{
		$date = $dokumen->getOriginal('tanggal_dokumen') ?? date('Y-m-d');
		$year = $dokumen->getOriginal('thn_dok') ?? date('Y');
		$agenda = $dokumen->getOriginal('agenda_dok') ?? $dokumen->agenda_dokumen;
		$tipe_dokumen = $dokumen->tipe_dokumen;

		if ($dokumen->getOriginal('no_dok') == null) {
			$latest_number = Penomoran::where([
				['tipe_dokumen', '=', $tipe_dokumen],
				['agenda', '=', $agenda],
				['tahun', '=', $year],
			])->first();
	
			if ($latest_number != null) {
				$number = $latest_number['nomor_terakhir'] + 1;
			} else {
				$number = 1;
			}
			$no_dok_lengkap = $tipe_dokumen . '-' . $number . $agenda . $year;
		} else {
			$number = $dokumen->getOriginal('no_dok');
			$no_dok_lengkap = $dokumen->getOriginal('no_dok_lengkap');
		}
		
		$dokumen['no_dok'] = $number;
		$dokumen['agenda_dok'] = $agenda;
		$dokumen['thn_dok'] = $year;
		$dokumen['no_dok_lengkap'] = $no_dok_lengkap;
		$dokumen['tanggal_dokumen'] = $date;
	}

	protected function updatePenomoran($dokumen) {
		$penomoran = Penomoran::where([
			['tipe_dokumen', '=', $dokumen->tipe_dokumen],
			['agenda', '=', $dokumen['agenda_dok']],
			['tahun', '=', $dokumen['thn_dok']],
		])->first();
		
		if ($penomoran != null) {
			// Update existing number
			$penomoran->update([
				'nomor_terakhir' => $dokumen['no_dok']
			]);
		} else {
			// Create new agenda
			Penomoran::create([
				'tipe_dokumen' =>  $dokumen->tipe_dokumen,
				'agenda' =>  $dokumen['agenda_dok'],
				'tahun' =>  $dokumen['thn_dok'],
				'nomor_terakhir' => $dokumen['no_dok'],
			]);
		}
		
	}

	protected function setLatestChainStatus($dokumen)
	{
		$dokumen->chain->update(['latest_document' => $dokumen->kode_dokumen]);
	}

	public function creating($dokumen) {
		$this->setDefaultDocumentProperties($dokumen);
		$dokumen['created_by'] = Auth::user()->nip;
		$dokumen['updated_by'] = Auth::user()->nip;
	}

	public function created($dokumen)
	{
		$dokumen->status_history()
			->create(['kode_status' => 'draft', 'nip_pegawai' => Auth::user()->nip]);
	}

	public function editing() 
	{
		$dokumen['updated_by'] = Auth::user()->nip;
	}

	public function edited($dokumen)
	{
		$dokumen->status_history()
			->create(['kode_status' => 'edit-draft', 'nip_pegawai' => Auth::user()->nip]);
	}

	public function booking($dokumen) 
	{
		$this->getNewDocumentNumber($dokumen);
		$dokumen['updated_by'] = Auth::user()->nip;
	}

	public function booked($dokumen) 
	{
		$this->updatePenomoran($dokumen);
		$dokumen->status_history()
			->create(['kode_status' => 'booking-nomor', 'nip_pegawai' => Auth::user()->nip]);
	}

	public function publishing($dokumen) 
	{
		$this->getNewDocumentNumber($dokumen);
		$dokumen['updated_by'] = Auth::user()->nip;
	}

	public function published($dokumen) 
	{
		$this->updatePenomoran($dokumen);
		$this->setLatestChainStatus($dokumen);
		$dokumen->status_history()
			->create(['kode_status' => 'terbit', 'nip_pegawai' => Auth::user()->nip]);
	}

	public function amended($dokumen) 
	{
		$dokumen->status_history()
			->create(['kode_status' => 'perbaikan', 'nip_pegawai' => Auth::user()->nip]);
	}

	public function deleting($dokumen) 
	{
		$dokumen['updated_by'] = Auth::user()->nip;
		$dokumen['deleted_by'] = Auth::user()->nip;	
	}

	public function deleted($dokumen) {
		// Change status
		$dokumen->update(['kode_status' => 'dihapus']);
		
		// Save history
		$dokumen->status_history()
			->create(['kode_status' => 'dihapus', 'nip_pegawai' => Auth::user()->nip]);

		// Delete chain if no other documents
		if ($dokumen->chain->latest_document == null) {
			$dokumen->chain->delete();
		}
	}
}
