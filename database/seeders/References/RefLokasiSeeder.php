<?php

namespace Database\Seeders\References;

use App\Models\References\RefLokasi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefLokasiSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$lokasi = [
			'TERMINAL 3 KEDATANGAN INTERNASIONAL',
			'TERMINAL 3 KEBERANGKATAN INTERNASIONAL',
			'TERMINAL 2F KEDATANGAN INTERNASIONAL',
			'TERMINAL 2F KEBERANGKATAN INTERNASIONAL',
			'TERMINAL 1 BANDARA INTERNASIONAL SOEKARNO HATTA',
			'GUDANG DHL',
			'GUDANG FEDEX',
			'GUDANG JAS IMPOR',
			'GUDANG JAS EKSPOR',
			'GUDANG GARUDA IMPOR',
			'GUDANG GARUDA EKSPOR',
			'GUDANG TNT',
			'GUDANG TNS',
			'GUDANG BDL',
			'GUDANG UPS',
			'GUDANG PJT GARUDA',
			'GUDANG EKSPOR GAPURA',
			'GUDANG GAPURA',
			'GUDANG EKSPOR BGD',
			'GUDANG BGD',
			'GUDANG RH',
			'GUDANG SKK',
			'GUDANG GPI',
			'GUDANG RPX',
			'GUDANG UNEX',
			'GUDANG IBS',
			'GUDANG PGT',
			'GUDANG MSA',
			'GUDANG PERIGI LOGISTIK',
			'GUDANG ARAMEX',
			'GUDANG TABHITA EXPRESS',
			'GUDANG PT SCHENKER PETROLOG UTAMA',
			'Gudang Ekspor PT Pos Indonesia',			
		];

		$now = Carbon::now('utc')->toDateTimeString();
		$data = array_map(function($k) use ($now) {
			return [
				'lokasi' => $k,
				"created_at" => $now,
				"updated_at" => $now,
			];
		}, $lokasi);
		RefLokasi::insert($data);
	}
}
