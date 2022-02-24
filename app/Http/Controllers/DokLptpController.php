<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLptpResource;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;

class DokLptpController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'lptp';
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->model = $this->switchObject($this->doc_type, 'model');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;

		$lptp = $this->model::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'jabatan_atasan' => $request->atasan['jabatan']['kode'],
			'plh' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
			'alasan_tidak_penindakan' => $request->alasan_tidak_penindakan,
			'catatan' => $request->catatan,
			'kode_status' => 100,
		]);

		$lptp_resource = new DokLptpResource($lptp);
		return $lptp_resource;
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
		$this->model::where('id', $id)->update([
			'jabatan_atasan' => $request->atasan['jabatan']['kode'],
			'plh' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
			'alasan_tidak_penindakan' => $request->alasan_tidak_penindakan,
			'catatan' => $request->catatan,
		]);
	}
}
