<?php

namespace Database\Seeders;

use App\Models\RefKepercayaanSumber;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefKepercayaanSumberSeeder extends Seeder
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
				'klasifikasi' => 'A',
				'keterangan' => 'Sangat dapat dipercaya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 'B',
				'keterangan' => 'Biasanya dapat dipercaya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 'C',
				'keterangan' => 'Cukup dipercaya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 'D',
				'keterangan' => 'Biasanya tidak dapat dipercaya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 'E',
				'keterangan' => 'Tidak dapat dipercaya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 'F',
				'keterangan' => 'Tidak dapat dipertimbangkan sama sekali',
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefKepercayaanSumber::insert($data);
	}
}
