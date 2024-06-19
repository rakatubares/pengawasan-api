<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Traits\DocumentTrait;
use Illuminate\Http\Request;

class BarangController extends Controller
{
	use DocumentTrait;

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'uraian_barang' => 'required',
			'jumlah_barang' => 'numeric',
			'satuan.id' => 'integer',
			'berat' => 'numeric|nullable',
			'kategori.id' => 'integer|nullable',
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
		$data = [];
		$data['jumlah_barang'] = $request->jumlah_barang;
		$data['satuan_id'] = $request->satuan['id'];
		$data['uraian_barang'] = $request->uraian_barang;
		$data['kategori_id'] = $request->kategori['id'];
		$data['berat'] = $request->berat;
		return $data;
	}

	public function index($doc_type, $doc_id) {
		$doc = $this->getDocument($doc_type, $doc_id);
		return BarangResource::collection($doc->barang);
	}

	public function show($doc_type, $doc_id, $item_id) {
		$doc = $this->getDocument($doc_type, $doc_id);
		$item = $doc->barang()->find($item_id);
		return new BarangResource($item);
	}

	public function store(Request $request, $doc_type, $doc_id) {
		$doc = $this->getDocument($doc_type, $doc_id);
		$this->validateData(($request));
		$data = $this->prepareData(($request));
		$doc->barang()->create($data);
	}

	public function update(Request $request, $doc_type, $doc_id, $item_id) {
		$doc = $this->getDocument($doc_type, $doc_id);
		$this->validateData(($request));
		$data = $this->prepareData(($request));
		$item = $doc->barang()->find($item_id);
		$item->update($data);
	}

	public function destroy($doc_type, $doc_id, $item_id) {
		$doc = $this->getDocument($doc_type, $doc_id);
		$item = $doc->barang()->find($item_id);
		$item->delete();
	}
}
