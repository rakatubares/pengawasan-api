<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;

trait DokumenTrait
{
	private $agenda;
	private $tahun;
	private $tanggal;

	/**
	 * Publish function
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @param string $jenis_surat
	 */
	public function publishDocument($model, $doc_id, $jenis_surat)
	{
		// Cek status penomoran surat
		$status = $this->checkStatus($model, $doc_id);

		// Bila nomor belum diisi update nomor surat
		if ($status) {
			$number = $this->getLatestDocNumber($model, $doc_id);
			$result = $this->updateDocNumberAndDate($model, $doc_id, $number, $jenis_surat);
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
		}

		return $result;
	}

	/**
	 * Cek penomoran surat
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @return boolean
	 */
	private function checkStatus($model, $doc_id)
	{
		$doc = $model::findOrFail($doc_id);
		if ($doc->no_dok == null) {
			$this->agenda = $doc->agenda_dok;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Ambil nomor baru
	 * 
	 * @param Model @model
	 * @return int
	 */
	private function getLatestDocNumber($model)
	{
		// Ambil tanggal saat ini
		$this->tahun = date('Y');
		$this->tanggal = date('Y-m-d') ;

		// Ambil nomor terakhir berdasarkan skema, agenda, dan tahun
		$latest_number = $model::select('no_dok')
			->where('agenda_dok', $this->agenda)
			->where('thn_dok', $this->tahun)
			->orderByDesc('no_dok')
			->first();

		// Buat nomor baru
		try {
			$number = ($latest_number->no_dok) + 1;
		} catch (\Throwable $th) {
			$number = 1;
		}
		

		return $number;
	}

	/**
	 * Update penomoran dokumen
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @param int $number
	 * @param string $jenis_surat
	 * @return Response
	 */
	private function updateDocNumberAndDate($model, $doc_id, $number, $jenis_surat)
	{
		$update_result = $model::where('id', $doc_id)
			->update([
				'no_dok' => $number,
				'thn_dok' => $this->tahun,
				'no_dok_lengkap' => $jenis_surat . '-' . $number . $this->agenda . $this->tahun,
				'tgl_dok' => $this->tanggal,
				'kode_status' => 200
			]);

		return $update_result;
	}

	/**
	 * Update status detail dokumen
	 */
	public function updateStatusDetail($model, $doc_id, $detail_type, $detail_status)
	{
		// Construct detail column name
		$detail_column = 'detail_' . $detail_type;

		// Update parent based on doc_type
		$update_result = $model::find($doc_id)
			->update([$detail_column => $detail_status]);

		// Return update result
		return $update_result;
	}
}