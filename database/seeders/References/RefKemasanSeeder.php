<?php

namespace Database\Seeders\References;

use App\Models\References\RefKemasan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefKemasanSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$kemasan = [
			'BOTOL', 'BOX', 'BUNGKUS', 'CARTON', 'CASE', 'KOLI', 'KALENG', 'KARUNG', 
			'PACKAGE', 'KEMASAN', 'PALLET', 'KANTONG', 'PLASTIK'
		];

		$now = Carbon::now('utc')->toDateTimeString();
		$data = array_map(function($k) use ($now) {
			return [
				'kemasan' => $k,
				"created_at" => $now,
				"updated_at" => $now,
			];
		}, $kemasan);

		RefKemasan::insert($data);
	}
}
