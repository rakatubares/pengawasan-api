<?php

namespace App\Http\Resources;

class DokLapResource extends RequestBasedResource
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
			'jenis_sumber' => $this->jenis_sumber,
			'nomor_sumber' => $this->nomor_sumber,
			'tanggal_sumber' => $this->tanggal_sumber->format('d-m-Y'),
			'dugaan_pelanggaran' => new RefKategoriPelanggaranResource($this->dugaan_pelanggaran),
			'flag_pelaku' => $this->flag_pelaku,
			'keterangan_pelaku' => $this->keterangan_pelaku,
			'flag_pelanggaran' => $this->flag_pelanggaran,
			'keterangan_pelanggaran' => $this->keterangan_pelanggaran,
			'flag_locus' => $this->flag_locus,
			'keterangan_locus' => $this->keterangan_locus,
			'flag_tempus' => $this->flag_tempus,
			'keterangan_tempus' => $this->keterangan_tempus,
			'flag_kewenangan' => $this->flag_kewenangan,
			'keterangan_kewenangan' => $this->keterangan_kewenangan,
			'flag_sdm' => $this->flag_sdm,
			'keterangan_sdm' => $this->keterangan_sdm,
			'flag_sarpras' => $this->flag_sarpras,
			'keterangan_sarpras' => $this->keterangan_sarpras,
			'flag_anggaran' => $this->flag_anggaran,
			'keterangan_anggaran' => $this->keterangan_anggaran,
			'flag_layak_penindakan' => $this->flag_layak_penindakan,
			'skema_penindakan' => new RefSkemaPenindakanResource($this->skema_penindakan),
			'keterangan_skema_penindakan' => $this->keterangan_skema_penindakan,
			'flag_layak_patroli' => $this->flag_layak_patroli,
			'keterangan_patroli' => $this->keterangan_patroli,
			'kesimpulan' => $this->kesimpulan,
			'penerbit' => [
				'jabatan' => new JabatanResource($this->jabatan_penerbit),
				'plh' => $this->plh_penerbit,
				'user' => new RefUserResource($this->penerbit),
			],
			'atasan' => [
				'jabatan' => new JabatanResource($this->jabatan_atasan),
				'plh' => $this->plh_atasan,
				'user' => new RefUserResource($this->atasan),
			],
		];

		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		if ($this->jenis_sumber == 'LI-1') {
			$array['sumber_id'] = $this->li->id;
		} else {
			$array['sumber_id'] = null;
		}
		return $array;
	}

	protected function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}
}
