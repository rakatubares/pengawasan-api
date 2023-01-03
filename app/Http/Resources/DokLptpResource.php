<?php

namespace App\Http\Resources;

class DokLptpResource extends RequestBasedResource
{
    protected function basic()
    {
        $array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'alasan_tidak_penindakan' => $this->alasan_tidak_penindakan,
			'catatan' => $this->catatan,
			'atasan' => [
				'jabatan' => new JabatanResource($this->jabatan),
				'plh' => $this->plh,
				'user' => new RefUserResource($this->atasan),
			],
			'kode_status' => $this->kode_status,
		];

		return $array;
    }

	protected function pdf()
	{
		$array = $this->basic();
		$array['no_sprint'] = $this->sbp->penindakan->sprint->nomor_sprint;
		$array['tanggal_sprint'] = $this->sbp->penindakan->sprint->tanggal_sprint;
		$array['no_sbp'] = $this->sbp->no_dok_lengkap;
		$array['tanggal_penindakan'] = $this->sbp->penindakan->tanggal_penindakan
			? $this->sbp->penindakan->tanggal_penindakan->format('d-m-Y')
			: null;
		$array['uraian_penindakan'] = $this->sbp->uraian_penindakan;
		$array['hal_terjadi'] = $this->sbp->hal_terjadi;
		$array['locus'] = $this->sbp->penindakan->lokasi_penindakan;
		$array['tempus'] = $this->sbp->wkt_mulai_penindakan->format('d-m-Y H:i:s');
		$array['saksi'] = new RefEntitasResource($this->sbp->penindakan->saksi);
		$array['petugas'] = new RefUserResource($this->sbp->penindakan->petugas1);
		$array['objek'] = new ObjectResource($this->sbp->penindakan->objectable, $this->sbp->penindakan->object_type);
		$array['kode_status'] = $this->kode_status;

		if ($array['objek'] != null) {
			if ($array['objek']->type == 'barang') {
				$riksa = $this->sbp->penindakan->riksa;
				if ($riksa != null) {
					$array['riksa'] = $riksa->no_dok_lengkap;
				}
			}
		}

		return $array;
	}
}
