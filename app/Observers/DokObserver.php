<?php

namespace App\Observers;

use App\Models\Penomoran;
use App\Traits\DocumentsChainTrait;

class DokObserver
{
	use DocumentsChainTrait;

	protected function setDefaultDocumentProperties($dokumen) {
		$no_dok_lengkap = $dokumen->tipe_dokumen . '-' . '      ' . $dokumen->agenda_dokumen;
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

		$latest_number = Penomoran::where([
			['tipe_dokumen', '=', $tipe_dokumen],
			['agenda', '=', $agenda],
			['tahun', '=', $year],
		])->first();

		if ($latest_number != null) {
			$new_number = $latest_number['nomor_terakhir'] + 1;
		} else {
			$new_number = 1;
		}

		$dokumen['no_dok'] = $new_number;
		$dokumen['agenda_dok'] = $agenda;
		$dokumen['thn_dok'] = $year;
		$dokumen['no_dok_lengkap'] = $tipe_dokumen . '-' . $new_number . $agenda . $year;
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
	}

	public function created($dokumen)
	{
		$dokumen->status_history()->create(['kode_status' => 'draft']);
	}

	public function edited($dokumen)
	{
		$dokumen->status_history()->create(['kode_status' => 'edit-draft']);
	}

	public function publishing($dokumen) {
		$this->getNewDocumentNumber($dokumen);
	}

	public function published($dokumen) {
		$this->updatePenomoran($dokumen);
		$this->setLatestChainStatus($dokumen);
		$dokumen->status_history()->create(['kode_status' => 'terbit']);
	}

	public function deleted($dokumen) {
		// Change status
		$dokumen->update(['kode_status' => 'dihapus']);
		
		// Save history
		$dokumen->status_history()->create(['kode_status' => 'dihapus']);

		// Delete chain if no other documents
		if ($dokumen->chain->latest_document == null) {
			$dokumen->chain->delete();
		}
	}
}
