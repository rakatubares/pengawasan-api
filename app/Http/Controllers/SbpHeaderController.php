<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpHeaderResource;
use App\Models\SbpHeader;
use Illuminate\Http\Request;

class SbpHeaderController extends Controller
{
	private $tipe_dok = 'SBP';
	private $agenda_dok = '/KPU.03/';
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_sbp = SbpHeader::all();
		$sbp_header_list = SbpHeaderResource::collection($all_sbp);
		return $sbp_header_list;
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
		
		$no_sbp_lengkap = $this->tipe_dok . '-' . '      ' . $this->agenda_dok;
		$tgl_sprint = strtotime($request->tgl_sprint);
		$wkt_mulai_penindakan = strtotime($request->wkt_mulai_penindakan);
		$wkt_selesai_penindakan = strtotime($request->wkt_selesai_penindakan);
        $insert_result = SbpHeader::create([
			'agenda_sbp' => $this->agenda_dok,
			'no_sbp_lengkap' => $no_sbp_lengkap,
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
        $sbpHeader = new SbpHeaderResource(SbpHeader::findOrFail($id));
		return $sbpHeader;
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
		
        $update_result = SbpHeader::where('id', $id)
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
		// return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		SbpHeader::where('id', $id)->update(['kode_status', 300]);
        $delete_result = SbpHeader::where('id', $id)->delete();
		return $delete_result;
    }
}
