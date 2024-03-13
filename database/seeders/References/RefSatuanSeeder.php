<?php

namespace Database\Seeders\References;

use App\Models\References\RefSatuan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$satuan = [
			'BATANG', 'BOTOL', 'BOX', 'BUNGKUS', 'BUTIR', 'CARTON', 'CASE', 'EKOR', 'GRAM', 
			'KALENG', 'KANTONG', 'KARUNG', 'KEMASAN', 'KG', 'KOLI', 'LEMBAR', 'LITER', 'METER', 
			'PACKAGE', 'PALLET', 'PASANG', 'PCS', 'PK', 'PLASTIK', 'ROLLS', 'SET', 'TABLET', 'UNIT'
		];

		$now = Carbon::now('utc')->toDateTimeString();
        $data = array_map(function($k) use ($now) {
			return [
				'satuan' => $k,
				"created_at" => $now,
				"updated_at" => $now,
			];
		}, $satuan);
		RefSatuan::insert($data);
    }
}
