<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpHeaderDetailResource;
use App\Http\Resources\SegelResource;
use App\Models\Segel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class SegelController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/SEGEL/KPU.03/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_segel = Segel::all();
		$segel_list = SegelResource::collection($all_segel);
		return $segel_list;
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
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			'nama_pemilik' => 'required',
			'pejabat1' => 'required'
		]);

        $no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 
		$tgl_sprint = strtotime($request->tgl_sprint);

		$insert_result = Segel::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'no_sprint' => $request->no_sprint,
			'tgl_sprint' => $tgl_sprint,
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'nomor_segel' => $request->nomor_segel,
			'lokasi_segel' => $request->lokasi_segel,
			'nama_pemilik' => $request->nama_pemilik,
			'alamat_pemilik' => $request->alamat_pemilik,
			'pekerjaan_pemilik' => $request->pekerjaan_pemilik,
			'jns_identitas' => $request->jns_identitas,
			'no_identitas' => $request->no_identitas,
			'pejabat1' => $request->pejabat1,
			'pejabat2' => $request->pejabat2,
			'kode_status' => 100,
		]);

		return $insert_result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $segel = new SegelResource(Segel::findOrFail($id));
		return $segel;
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
        $request->validate([
			'no_sprint' => 'required',
			'tgl_sprint' => 'required|date',
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			'nama_pemilik' => 'required',
			'pejabat1' => 'required'
		]);

		$tgl_sprint = date('Y-m-d', strtotime($request->tgl_sprint));

		$update_result = Segel::where('id', $id)
			->update([
				'no_sprint' => $request->no_sprint,
				'tgl_sprint' => $tgl_sprint,
				'jenis_segel' => $request->jenis_segel,
				'jumlah_segel' => $request->jumlah_segel,
				'nomor_segel' => $request->nomor_segel,
				'lokasi_segel' => $request->lokasi_segel,
				'nama_pemilik' => $request->nama_pemilik,
				'alamat_pemilik' => $request->alamat_pemilik,
				'pekerjaan_pemilik' => $request->pekerjaan_pemilik,
				'jns_identitas' => $request->jns_identitas,
				'no_identitas' => $request->no_identitas,
				'pejabat1' => $request->pejabat1,
				'pejabat2' => $request->pejabat2,
				'kode_status' => 101,
			]);

		return $update_result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update_result = Segel::where('id', $id)
			->whereIn('kode_status', [100,101])
			->update(['kode_status' => 300]);

		if ($update_result) {
			$delete_result = Segel::where('id', $id)->delete();
		} else {
			$delete_result = response()->json(['error' => 'Gagal menghapus dokumen.'], 422);
		}
		
		return $delete_result;
    }

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(Segel::class, $id, 'BA');
		return $doc;
	}
}
