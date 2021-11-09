<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\SerahTerimaResource;
use App\Models\SerahTerima;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class SerahTerimaController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BAST';
	private $agenda_dok = '/KPU.03/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_bast = SerahTerima::all();
		$bast_list = SerahTerimaResource::collection($all_bast);
		return $bast_list;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'no_sprint' => 'required',
			'tgl_sprint' => 'required|date',
			'nama_penerima' => 'required',
			'pejabat' => 'required'
		]);

		$no_dok_lengkap = $this->tipe_dok . '-' . '      ' . $this->agenda_dok;
		$tgl_sprint = strtotime($request->tgl_sprint);
		$insert_result = SerahTerima::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'no_sprint' => $request->no_sprint,
			'tgl_sprint' => $tgl_sprint,
			'nama_penerima' => $request->nama_penerima,
			'jns_identitas' => $request->jns_identitas,
			'no_identitas' => $request->no_identitas,
			'atas_nama_penerima' => $request->atas_nama_penerima,
			'dalam_rangka' => $request->dalam_rangka,
			'pejabat' => $request->pejabat,
			'kode_status' => 100
		]);

		return $insert_result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$bast = new SerahTerimaResource(SerahTerima::findOrFail($id));
		return $bast;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$detailStatus = new DetailStatusResource(SerahTerima::findOrFail($id));
		return $detailStatus;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Check if document is published
		$is_unpublished = $this->checkUnpublished(SerahTerima::class, $id);

		if ($is_unpublished) {
			$request->validate([
				'no_sprint' => 'required',
				'tgl_sprint' => 'required|date',
				'nama_penerima' => 'required',
				'pejabat' => 'required'
			]);
	
			$tgl_sprint = date('Y-m-d', strtotime($request->tgl_sprint));
			$update_result = SerahTerima::where('id', $id)
				->update([
					'no_sprint' => $request->no_sprint,
					'tgl_sprint' => $tgl_sprint,
					'nama_penerima' => $request->nama_penerima,
					'jns_identitas' => $request->jns_identitas,
					'no_identitas' => $request->no_identitas,
					'atas_nama_penerima' => $request->atas_nama_penerima,
					'dalam_rangka' => $request->dalam_rangka,
					'pejabat' => $request->pejabat
				]);

			$result = $update_result;
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}

		return $result;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$result = $this->deleteDocument(SerahTerima::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(SerahTerima::class, $id, $this->tipe_dok);
		return $doc;
	}
}
