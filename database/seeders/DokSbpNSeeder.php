<?php

namespace Database\Seeders;

class DokSbpNSeeder extends DokSbpSeeder
{
	public function __construct()
	{
		$this->tipe_dok = 'sbpn';
		$this->tipe_lptp = 'lptpn';
		$this->prepareModel();
	}

	protected function createLptp()
	{
		$tipe_surat_lptp = $this->switchObject($this->tipe_lptp, 'tipe_dok');
		$agenda_lptp = $this->switchObject($this->tipe_lptp, 'agenda');
		$max_lptp = $this->model_lptp::max('no_dok');
		$crn_lptp = $max_lptp + 1;

		$lptp = $this->model_lptp::create([
			'no_dok' => $crn_lptp,
			'agenda_dok' => $agenda_lptp,
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => $tipe_surat_lptp . '-' . $crn_lptp . $agenda_lptp . date("Y"),
			'catatan' => $this->faker->sentence($nbWOrds = 10),
			'kode_status' => 200,
		]);

		return $lptp;
	}
}
