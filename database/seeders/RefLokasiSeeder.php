<?php

namespace Database\Seeders;

use App\Models\RefLokasi;
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
		$now = Carbon::now('utc')->toDateTimeString();
		$data = [
			[
				'lokasi' => 'Lainnya',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'lokasi' => 'Terminal',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'lokasi' => 'Kargo',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefLokasi::insert($data);
	}
}
