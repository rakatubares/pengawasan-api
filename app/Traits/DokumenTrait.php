<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;

trait DokumenTrait
{
	private $doc;
	private $tahun;
	private $tanggal;
	public $unpublished_status = [100, 101];

	/**
	 * Get document by ID then save to global variable
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 */
	private function getDocument($model, $doc_id)
	{
		$this->doc = $model::findOrFail($doc_id);
	}

	/**
	 * Check if document is unpublished
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @return boolean
	 */
	public function checkUnpublished($model, $doc_id)
	{
		// Get document
		$this->getDocument($model, $doc_id);

		// Return TRUE if document is unpublished
		$kode_status = $this->doc->kode_status;
		$is_unpublished = (in_array($kode_status, $this->unpublished_status)) ? true : false;
		return $is_unpublished;
	}

	/**
	 * Get current date and year
	 */
	private function getCurrentDate()
	{
		$this->tanggal = date('Y-m-d') ;
		$this->tahun = date('Y') ;
	}

	/*
	 |--------------------------------------------------------------------------
	 | PUBLISH DOCUMENT
	 |--------------------------------------------------------------------------
	 */
	 
	/**
	 * Publish function
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @param string $jenis_surat
	 * @return Response
	 */
	public function publishDocument($model, $doc_id, $jenis_surat)
	{
		// Check if document is unpublished
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		// Publish document if still unpulished
		if ($is_unpublished) {
			$this->getCurrentDate();
			$number = $this->getNewDocNumber($model, $doc_id);
			$result = $this->updateDocNumberAndDate($model, $doc_id, $number, $jenis_surat);
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
		}
		
		return $result;
	}

	/**
	 * Get new number
	 * 
	 * @param Model @model
	 * @return int
	 */
	private function getNewDocNumber($model)
	{
		// Ambil nomor terakhir berdasarkan skema, agenda, dan tahun
		$agenda_dok = $this->doc->agenda_dok;
		$latest_number = $model::select('no_dok')
			->where('agenda_dok', $agenda_dok)
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
	private function updateDocNumberAndDate($number, $jenis_surat)
	{
		// Construct full document number
		$no_dok_lengkap = $jenis_surat 
			. '-' 
			. $number 
			. $this->doc->agenda_dok 
			. $this->tahun;

		// Set new values then update
		$this->doc->no_dok = $number;
		$this->doc->thn_dok = $this->tahun;
		$this->doc->no_dok_lengkap = $no_dok_lengkap;
		$this->doc->tgl_dok = $this->tanggal;
		$this->doc->kode_status = 200;
		$update_result = $this->doc->save();

		return $update_result;
	}

	/*
	 |--------------------------------------------------------------------------
	 | DELETE DOCUMENT
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Model $model
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deleteDocument($model, $doc_id)
	{
		// Check if document is unpublished
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		// Delete document if still unpulished
		if ($is_unpublished) {
			// Use transaction
			DB::beginTransaction();

			$update_result = $this->doc->update(['kode_status' => 300]); // Update kode status
			$delete_result = $this->doc->delete(); // Delete data

			// Rollback if either transaction failed
			if ($update_result != 1 || $delete_result != 1) {
				DB::rollBack();
				$result = response()->json(['error' => 'Gagal menghapus dokumen.'], 422);
			} else {
				DB::commit();
				$result = $delete_result;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat menghapus dokumen.'], 422);
		}
		
		return $result;
	}

	/*
	 |--------------------------------------------------------------------------
	 | UPDATE DOCUMENT DETAIL STATUS
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Update status detail dokumen
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @param string $detail_type
	 * @param int $detail_status
	 * @return Response
	 */
	public function updateStatusDetail($model, $doc_id, $detail_type, $detail_status)
	{
		// Check if document is unpublished
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		if ($is_unpublished) {
			// Construct detail column name
			$detail_column = 'detail_' . $detail_type;

			// Update detail status
			$result = $this->doc->update([$detail_column => $detail_status]);
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}

		return $result;
	}
}