<?php

namespace App\Http\Controllers;

use App\Http\Resources\LptpResource;
use App\Models\Lptp;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class LptpController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'LPTP';
	private $agenda_dok = '/KPU.03/BD.05/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;

        $lptp = Lptp::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'jabatan_atasan' => $request->jabatan_atasan['kode'],
			'plh' => $request->plh,
			'atasan_id' => $request->atasan['user_id'],
			'alasan_tidak_penindakan' => $request->alasan_tidak_penindakan,
			'kode_status' => 100,
		]);

		$lptp_resource = new LptpResource($lptp);
		return $lptp_resource;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Lptp::where('id', $id)->update([
			'jabatan_atasan' => $request->jabatan_atasan['kode'],
			'plh' => $request->plh,
			'atasan_id' => $request->atasan['user_id'],
			'alasan_tidak_penindakan' => $request->alasan_tidak_penindakan,
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
