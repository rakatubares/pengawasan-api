<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokReeksporResource;
use App\Http\Resources\DokReeksporTableResource;
use App\Models\DokReekspor;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokReeksporController extends Controller
{
	use DokumenTrait;

	public function __construct()
	{
		$this->doc_type = 'reekspor';
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_reekspor = DokReekspor::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$reekspor_list = DokReeksporTableResource::collection($all_reekspor);
		return $reekspor_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$reekspor = new DokReeksporResource(DokReekspor::findOrFail($id));
		return $reekspor;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$contoh = new DokReeksporResource(DokReekspor::findOrFail($id), 'display');
		return $contoh;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateData(Request $request)
	{
		$request->validate([
			'jenis_dok_asal' => 'required',
			'nomor_dok_asal' => 'required',
			'tanggal_dok_asal' => 'required|date',
			'jenis_dok_ekspor' => 'required',
			'nomor_dok_ekspor' => 'required',
			'tanggal_dok_ekspor' => 'required|date',
			'tanggal_mawb' => 'nullable|date',
			'tanggal_hawb' => 'nullable|date',
			'tanggal_flight' => 'nullable|date',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . $this->agenda_dok;
		$tanggal_dok_asal = date('Y-m-d', strtotime($request->tanggal_dok_asal));
		$tanggal_dok_ekspor = date('Y-m-d', strtotime($request->tanggal_dok_ekspor));
		$tanggal_mawb = $request->tanggal_mawb != null ? date('Y-m-d', strtotime($request->tanggal_mawb)) : null;
		$tanggal_hawb = $request->tanggal_hawb != null ? date('Y-m-d', strtotime($request->tanggal_hawb)) : null;
		$tanggal_flight = $request->tanggal_flight != null ? date('Y-m-d', strtotime($request->tanggal_flight)) : null;
		
		$data_reekspor = [
			'jenis_dok_asal' => $request->jenis_dok_asal,
			'nomor_dok_asal' => $request->nomor_dok_asal,
			'tanggal_dok_asal' => $tanggal_dok_asal,
			'jenis_dok_ekspor' => $request->jenis_dok_ekspor,
			'nomor_dok_ekspor' => $request->nomor_dok_ekspor,
			'tanggal_dok_ekspor' => $tanggal_dok_ekspor,
			'nomor_mawb' => $request->nomor_mawb,
			'tanggal_mawb' => $tanggal_mawb,
			'nomor_hawb' => $request->nomor_hawb,
			'tanggal_hawb' => $tanggal_hawb,
			'nama_sarkut' => $request->nama_sarkut,
			'nomor_flight' => $request->nomor_flight,
			'tanggal_flight' => $tanggal_flight,
			'nomor_reg_sarkut' => $request->nomor_reg_sarkut,
			'kedapatan' => $request->kedapatan,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_reekspor['agenda_dok'] = $this->agenda_dok;
			$data_reekspor['no_dok_lengkap'] = $no_dok_lengkap;
			$data_reekspor['kode_status'] = 100;
		};

		return $data_reekspor;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data
			$data_reekspor = $this->prepareData($request, 'insert');
			$reekspor = DokReekspor::create($data_reekspor);

			// Commit store query
			DB::commit();

			// Return saved data
			$reekspor_resource = new DokReeksporResource(DokReekspor::findOrFail($reekspor->id), 'display');
			return $reekspor_resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
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
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(DokReekspor::class, $id);

		// Update if unpublished
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data segel
				$this->validateData($request);

				// Update data
				$data_reekspor = $this->prepareData($request, 'update');
				DokReekspor::where('id', $id)->update($data_reekspor);

				// Commit store query
				DB::commit();

				// Return updated data
				$titip_resource = new DokReeksporResource(DokReekspor::findOrFail($id), 'form');
				$result = $titip_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			$this->getDocument(DokReekspor::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokReekspor::class);

			$this->doc->update(['tanggal_dokumen' => $this->tanggal]);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokReekspor::class, $id);
			if ($is_unpublished) {
				DokReekspor::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
