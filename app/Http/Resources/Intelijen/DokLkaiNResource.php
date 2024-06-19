<?php

namespace App\Http\Resources\Intelijen;

class DokLkaiNResource extends DokLkaiResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource)
	{
		parent::__construct($resource, 'lkain');
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = $this->lkaiArray();
		
		$lppin = $this->chain->lppin;
		$array['lppin_id'] = $lppin != null ? $lppin->id : null;
		$array['nomor_lppin'] = $lppin != null ? $lppin->no_dok_lengkap : null;
		$array['tanggal_lppin'] = $lppin != null ? $lppin->tanggal_dokumen->format('d-m-Y') : null;
		$array['flag_lptin'] = $this->flag_lptin == 1 ? true : false;
		$array['nomor_lptin'] = $this->nomor_lptin;
		$array['tanggal_lptin'] = $this->tanggal_lptin
			? $this->tanggal_lptin->format('d-m-Y')
			: null;
		$array['flag_npin'] = $this->flag_npin == 1 ? true : false;
		$array['nomor_npin'] = $this->nomor_npin;
		$array['tanggal_npin'] = $this->tanggal_npin
			? $this->tanggal_npin->format('d-m-Y')
			: null;
		$array['flag_rekom_nhin'] = $this->flag_rekom_nhin == 1 ? true : false;
		$array['flag_rekom_nin'] = $this->flag_rekom_nin == 1 ? true : false;
		return $array;
	}
}