<?php

namespace App\Http\Resources;

class DokLphpResource extends RequestBasedResource
{
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
			'analisa' => $this->analisa,
			'catatan' => $this->catatan,
			'penyusun' => [
				'jabatan' => new JabatanResource($this->jabatan_penyusun),
				'plh' => $this->plh_penyusun,
				'user' => new RefUserResource($this->penyusun),
			],
			'atasan' => [
				'jabatan' => new JabatanResource($this->jabatan_atasan),
				'plh' => $this->plh_atasan,
				'user' => new RefUserResource($this->atasan),
			],
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
		$lptp = $this->lptp;
		$sbp = $lptp->sbp;

		$array = $this->basic();
		$array['no_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['no_lptp'] = $lptp->no_dok_lengkap;
		$array['tanggal_lptp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['uraian_penindakan'] = $sbp->uraian_penindakan;

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
				$riksa = $this->lptp->sbp->penindakan->riksa;
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
		$array['id_sbp'] = $this->lptp->sbp->id;

		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->lptp->sbp->penindakan->objectable, $this->lptp->sbp->penindakan->object_type);
	}
}
