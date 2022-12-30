<?php

namespace App\Http\Resources;

class DokLpResource extends RequestBasedResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y')
				: null,
			'pasal' => $this->pasal,
			'modus' => $this->modus,
			'pejabat' => [
				'jabatan' => new JabatanResource($this->jabatan),
				'plh' => $this->plh,
				'user' => new RefUserResource($this->pejabat),
			],
			'kode_status' => $this->kode_status,
		];

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function display()
	{
		$lphp = $this->lphp;
		$sbp = $lphp->lptp->sbp;

		$array = $this->basic();
		$array['no_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['no_lphp'] = $lphp->no_dok_lengkap;
		$array['tanggal_lphp'] = $lphp->tanggal_dokumen->format('d-m-Y');
		$array['uraian_penindakan'] = $sbp->uraian_penindakan;
		$array['jenis_pelanggaran'] = $sbp->jenis_pelanggaran;
		$array['locus'] = $sbp->penindakan->lokasi_penindakan;
		$array['tempus'] = $sbp->wkt_mulai_penindakan->format('d-m-Y H:i:s');
		$array['saksi'] = new RefEntitasResource($sbp->penindakan->saksi);

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function pdf()
	{
		$array = $this->display();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;

		if ($array['objek'] != null) {
			if ($array['objek']->type == 'barang') {
				$riksa = $this->lphp->lptp->sbp->penindakan->riksa;
				if ($riksa != null) {
					$array['riksa'] = $riksa->no_dok_lengkap;
				}
			}
		}

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function form()
	{
		$array = $this->basic();
		$array['id_sbp'] = $this->lphp->lptp->sbp->id;

		return $array;
	}

	protected function number()
	{
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen->format('d-m-Y'),
		];

		return $array;
	}

	protected function objek()
	{
		$penindakan = $this->lphp->lptp->sbp->penindakan;
		return new ObjectResource($penindakan->objectable, $penindakan->object_type);
	}
}
