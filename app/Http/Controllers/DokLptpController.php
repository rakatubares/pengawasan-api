<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLptpResource;
use App\Models\DokLptp;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class DokLptpController extends Controller
{
	use DokumenTrait;

	public function __construct()
	{
		$this->doc_type = 'lptp';
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
	}

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
		$no_dok_lengkap = $this->tipe_surat . '-' . $this->agenda_dok;

        $lptp = DokLptp::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'jabatan_atasan' => $request->jabatan_atasan['kode'],
			'plh' => $request->plh,
			'atasan_id' => $request->atasan['user_id'],
			'alasan_tidak_penindakan' => $request->alasan_tidak_penindakan,
			'kode_status' => 100,
		]);

		$lptp_resource = new DokLptpResource($lptp);
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
        DokLptp::where('id', $id)->update([
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
