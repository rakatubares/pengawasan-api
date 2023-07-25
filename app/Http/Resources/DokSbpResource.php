<?php

namespace App\Http\Resources;

use App\Traits\SwitcherTrait;

class DokSbpResource extends RequestBasedResource
{
	use SwitcherTrait;

	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $request_type='')
	{
		parent::__construct($resource, $request_type);
		$this->doc_type = 'sbp';
	}

	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'uraian_penindakan' => $this->uraian_penindakan,
			'alasan_penindakan' => $this->alasan_penindakan,
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $this->wkt_mulai_penindakan->format('d-m-Y H:i'),
			'wkt_selesai_penindakan' => $this->wkt_selesai_penindakan->format('d-m-Y H:i'),
			'hal_terjadi' => $this->hal_terjadi,
		];
		return $array;
	}

	protected function display()
	{
		$lap = $this->penindakan->lap;
		$lptp_type = $this->doc_type == 'sbpn' ? 'lptpn' : 'lptp';
		$lptp_resource = $this->switchObject($lptp_type, 'resource');
		
		$array = $this->basic();
		$array['lap_id'] = $lap != null ? $lap->id : null;
		$array['nomor_lap'] = $lap != null ? $lap->no_dok_lengkap : null;
		$array['tanggal_lap'] = $lap != null ? $lap->tanggal_dokumen->format('d-m-Y') : null;
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		$array['lptp'] = new $lptp_resource($this->lptp);
		return $array;
	}

	protected function form()
	{
		$array = $this->display();
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}

	protected function number()
	{
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->penindakan->tanggal_penindakan->format('d-m-Y'),
		];

		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
	}
}
