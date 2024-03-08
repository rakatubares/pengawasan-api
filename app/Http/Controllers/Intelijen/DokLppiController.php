<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Traits\ConverterTrait;
use App\Traits\IkhtisarInformasiTrait;
use Illuminate\Http\Request;

class DokLppiController extends DokController
{
	use ConverterTrait;
	use IkhtisarInformasiTrait;

	public function __construct($doc_type='lppi')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'flag_info_internal' => 'boolean',
			'tgl_terima_info_internal' => 'nullable|date',
			'tgl_dok_info_internal' => 'nullable|date',
			'flag_info_eksternal' => 'boolean',
			'tgl_terima_info_eksternal' => 'nullable|date',
			'tgl_dok_info_eksternal' => 'nullable|date',
			'flag_analisis' => 'nullable|boolean',
			'flag_arsip' => 'nullable|boolean',
			'tanggal_disposisi' => 'nullable|date',
			'petugas.penerima_informasi.nip' => 'nullable|integer',
			'petugas.penilai_informasi.nip' => 'nullable|integer',
			'petugas.penerima_disposisi.nip' => 'integer',
			'petugas.pejabat.nip' => 'integer',
			'informasi' => 'required|array|min:1'
		]);
	}

	/**
	 * Prepare data from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request)
	{
		$tgl_terima_info_internal = $this->dateFromText($request->tgl_terima_info_internal);
		$tgl_dok_info_internal = $this->dateFromText($request->tgl_dok_info_internal);
		$tgl_terima_info_eksternal = $this->dateFromText($request->tgl_terima_info_eksternal);
		$tgl_dok_info_eksternal = $this->dateFromText($request->tgl_dok_info_eksternal);
		$tanggal_disposisi = $this->dateFromText($request->tanggal_disposisi);

		// $data = parent::prepareData($request, $state);
		$data = [];
		$data['flag_info_internal'] = $request->flag_info_internal;
		$data['media_info_internal'] = $request->media_info_internal;
		$data['tgl_terima_info_internal'] = $tgl_terima_info_internal;
		$data['no_dok_info_internal'] = $request->no_dok_info_internal;
		$data['tgl_dok_info_internal'] = $tgl_dok_info_internal;
		$data['flag_info_eksternal'] = $request->flag_info_eksternal;
		$data['media_info_eksternal'] = $request->media_info_eksternal;
		$data['tgl_terima_info_eksternal'] = $tgl_terima_info_eksternal;
		$data['no_dok_info_eksternal'] = $request->no_dok_info_eksternal;
		$data['tgl_dok_info_eksternal'] = $tgl_dok_info_eksternal;
		$data['kesimpulan'] = $request->kesimpulan;
		$data['tanggal_disposisi'] = $tanggal_disposisi;
		$data['flag_analisis'] = $request->flag_analisis;
		$data['flag_arsip'] = $request->flag_arsip;
		$data['catatan'] = $request->catatan;
		return $data;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$chain = $this->createChain();
		$data['chain_id'] = $chain->id;
		return $data;
	}

	protected function stored(Request $request) {
		$this->createInformasi($request->informasi);
		parent::stored($request);
	}

	protected function updated(Request $request) {
		$this->updateInformasi($request->informasi);
		parent::updated($request);
	}

	private function createInformasi($new_infos) {
		foreach ($new_infos as $info) {
			$this->doc->informasi()->create($info);
		}
	}

	private function updateInformasi($new_infos) {
		$old_infos = $this->doc->informasi;

		// Update existing info or insert new info if the new ones more than old ones
		foreach ($new_infos as $k => $info) {
			if ($k < sizeof($old_infos)) {
				$info_id = $old_infos[$k]['id'];
				$this->doc->informasi()->find($info_id)->update($info);
			} else {
				$this->doc->informasi()->create($info);
			}
		}

		// Delete exceeding info if the old ones more than the new ones
		if (sizeof($new_infos) < sizeof($old_infos)) {
			for ($i=sizeof($new_infos); $i < sizeof($old_infos); $i++) { 
				$info_id = $old_infos[$i]['id'];
				$this->doc->informasi()->find($info_id)->delete($info);
			}
		}
	}
}