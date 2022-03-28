<?php

namespace Database\Seeders;

use App\Models\RefValiditasInformasi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefValiditasInformasiSeeder extends Seeder
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
				'klasifikasi' => 1,
				'keterangan' => 'Dipastikan kebenarannya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 2,
				'keterangan' => 'Besar (dominan) kemungkinan kebenarannya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 3,
				'keterangan' => 'Kemungkinan benarnya berimbang (50-50)',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 4,
				'keterangan' => 'Diragukan kebenarannya',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 5,
				'keterangan' => 'Dipastikan tidak benar',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'klasifikasi' => 6,
				'keterangan' => 'Kebenarannya tidak dapat dinilai',
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefValiditasInformasi::insert($data);
	}
}
