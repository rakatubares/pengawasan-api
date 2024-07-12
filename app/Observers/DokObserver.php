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
		$noDokLengkap = $dokumen->tipeDokumen . '-' . '      ' . $dokumen->agendaDokumen . $dokumen->thn_dok;
		$dokumen['agenda_dok'] = $dokumen->agendaDokumen;
		$dokumen['no_dok_lengkap'] = $noDokLengkap;
		$dokumen['kode_status'] = 'draft';
	}

	protected function getNewDocumentNumber($dokumen)
	{
		$date = $dokumen->getOriginal('tanggal_dokumen') ?? date('Y-m-d');
		$year = $dokumen->getOriginal('thn_dok') ?? date('Y');
		$agenda = $dokumen->getOriginal('agenda_dok') ?? $dokumen->agendaDokumen;
		$tipeDokumen = $dokumen->tipeDokumen;

		if ($dokumen->getOriginal('no_dok') == null) {
			$latest_number = Penomoran::where([
				['tipe_dokumen', '=', $tipeDokumen],
				['agenda', '=', $agenda],
				['tahun', '=', $year],
			])->first();
	
			if ($latest_number != null) {
				$number = $latest_number['nomor_terakhir'] + 1;
			} else {
				$number = 1;
			}
			$noDokLengkap = $tipeDokumen . '-' . $number . $agenda . $year;
		} else {
			$number = $dokumen->getOriginal('no_dok');
			$noDokLengkap = $dokumen->getOriginal('no_dok_lengkap');
		}
		
		$dokumen['no_dok'] = $number;
		$dokumen['agenda_dok'] = $agenda;
		$dokumen['thn_dok'] = $year;
		$dokumen['no_dok_lengkap'] = $noDokLengkap;
		$dokumen['tanggal_dokumen'] = $date;
	}

	protected function updatePenomoran($dokumen) {
		Penomoran::upsert([
			'tipe_dokumen' =>  $dokumen->tipeDokumen,
			'agenda' =>  $dokumen['agenda_dok'],
			'tahun' =>  $dokumen['thn_dok'],
			'nomor_terakhir' => $dokumen['no_dok'],
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);
	}

	protected function setLatestChainStatus($dokumen)
	{
		$dokumen->chain->update(['latest_document' => $dokumen->kodeDokumen]);
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
