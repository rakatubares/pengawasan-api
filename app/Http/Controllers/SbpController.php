<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\SbpResource;
use App\Models\Sbp;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class SbpController extends Controller
{
	use DokumenTrait;
	
	private $tipe_dok = 'SBP';
	private $agenda_dok = '/KPU.03/';
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_sbp = Sbp::all();
		$sbp_list = SbpResource::collection($all_sbp);
		return $sbp_list;
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
			'lokasi_penindakan' => 'required',
			'wkt_mulai_penindakan' => 'required|date',
			'wkt_selesai_penindakan' => 'required|date',
			'nama_pemilik' => 'required',
			'pejabat1' => 'required'
		]);
		
		$no_dok_lengkap = $this->tipe_dok . '-' . '      ' . $this->agenda_dok;
		$tgl_sprint = strtotime($request->tgl_sprint);
		$wkt_mulai_penindakan = strtotime($request->wkt_mulai_penindakan);
		$wkt_selesai_penindakan = strtotime($request->wkt_selesai_penindakan);
        $insert_result = Sbp::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'no_sprint' => $request->no_sprint,
			'tgl_sprint' => $tgl_sprint,
			'lokasi_penindakan' => $request->lokasi_penindakan,
			'uraian_penindakan' => $request->uraian_penindakan,
			'alasan_penindakan' => $request->alasan_penindakan,
			'jenis_pelanggaran' => $request->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $wkt_mulai_penindakan,
			'wkt_selesai_penindakan' => $wkt_selesai_penindakan,
			'hal_terjadi' => $request->hal_terjadi,
			'nama_pemilik' => $request->nama_pemilik,
			'pejabat1' => $request->pejabat1,
			'pejabat2' => $request->pejabat2,
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
        $sbp = new SbpResource(Sbp::findOrFail($id));
		return $sbp;
    }

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$detailStatus = new DetailStatusResource(Sbp::findOrFail($id));
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
		$request->validate([
			'no_sprint' => 'required',
			'tgl_sprint' => 'required|date',
			'lokasi_penindakan' => 'required',
			'wkt_mulai_penindakan' => 'required|date',
			'wkt_selesai_penindakan' => 'required|date',
			'nama_pemilik' => 'required',
			'pejabat1' => 'required'
		]);

		$tgl_sprint = date('Y-m-d', strtotime($request->tgl_sprint));
		$wkt_mulai_penindakan = date('Y-m-d H:i:s', strtotime($request->wkt_mulai_penindakan));
		$wkt_selesai_penindakan = date('Y-m-d H:i:s', strtotime($request->wkt_selesai_penindakan));
		
        $update_result = Sbp::where('id', $id)
			->update([
				'no_sprint' => $request->no_sprint,
				'tgl_sprint' => $tgl_sprint,
				'lokasi_penindakan' => $request->lokasi_penindakan,
				'uraian_penindakan' => $request->uraian_penindakan,
				'alasan_penindakan' => $request->alasan_penindakan,
				'jenis_pelanggaran' => $request->jenis_pelanggaran,
				'wkt_mulai_penindakan' => $wkt_mulai_penindakan,
				'wkt_selesai_penindakan' => $wkt_selesai_penindakan,
				'hal_terjadi' => $request->hal_terjadi,
				'nama_pemilik' => $request->nama_pemilik,
				'pejabat1' => $request->pejabat1,
				'pejabat2' => $request->pejabat2,
				'kode_status' => 101
			]);

		return $update_result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$update_result = Sbp::where('id', $id)
			->whereIn('kode_status', [100,101])
			->update(['kode_status' => 300]);

		if ($update_result) {
			$delete_result = Sbp::where('id', $id)->delete();
		} else {
			$delete_result = response()->json(['error' => 'Gagal menghapus dokumen.'], 422);
		}
		
		return $delete_result;
    }

	/**
	 * Terbitkan penomoran SBP
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(Sbp::class, $id, 'SBP');
		return $doc;
	}
}
