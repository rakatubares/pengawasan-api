<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;

trait DokumenTrait
{
	use SwitcherTrait;

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
	public function publishDocument($doc_type, $doc_id, $year)
	{
		echo "publish doc";
		var_dump($doc_type);
		// Get model and doc type
		$model = $this->switchObject($doc_type, 'model');
		$jenis_surat = $this->switchObject($doc_type, 'tipe_dok');
		var_dump($model);

		// Check if document is unpublished
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		// Publish document if still unpulished
		if ($is_unpublished) {
			$this->tahun = $year;
			$number = $this->getNewDocNumber($model, $doc_id);
			$result = $this->updateDocNumberAndYear($number, $jenis_surat);
			$result = $this->tanggal;

			switch ($doc_type) {
				case 'segel':
					$model::where('id', $doc_id)
						->update(['nomor_segel' => DB::raw('no_dok_lengkap')]);
					break;

				case 'pengaman':
					$model::where('id', $doc_id)
						->update(['nomor_pengaman' => DB::raw('no_dok_lengkap')]);
					break;

				case 'bast':
					$model::where('id', $doc_id)
						->update(['tanggal_dokumen' => $this->tanggal]);
					break;
				
				default:
					# code...
					break;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
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
	 * @param Int $doc_id
	 * @param String $detail_type
	 * @param Int $detail_status
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

	/*
	 |--------------------------------------------------------------------------
	 | GET DOCUMENT DETAIL
	 |--------------------------------------------------------------------------
	 */
	
	 /**
	  * Get document detail
	  * 
	  * @param Model $model
	  * @param int $doc_id
	  * @return Response
	  */
	public function getDetail($model, $doc_id)
	{
		// Get document
		$this->getDocument($model, $doc_id);
		$jenis_objek = $this->doc->objek_penindakan;

		// Get detail based on object type
		switch ($jenis_objek) {
			case 'sarkut':
				$data_objek = $this->doc->sarkut;
				break;
			
			case 'barang':
				$data_objek = $this->doc->barang;
				$data_objek->itemBarang;
				break;

			case 'bangunan':
				$data_objek = $this->doc->bangunan;
				break;

			case 'badan':
				$data_objek = $this->doc->badan;
				break;
			
			default:
				$data_objek = null;
				break;
		}

		$objek = [
			'jenis' => $jenis_objek,
			'data' => $data_objek
		];

		return $objek;
	}
}