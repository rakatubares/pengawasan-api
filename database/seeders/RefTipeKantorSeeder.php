<?php

namespace Database\Seeders;

use App\Models\RefTipeKantor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefTipeKantorSeeder extends Seeder
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
				'tipe_kantor' => 'KANTOR PUSAT',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'SEKRETARIAT',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'TENAGA PENGKAJI',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'DIREKTORAT',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'KANTOR PELAYANAN UTAMA',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'KANTOR WILAYAH',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'KANTOR PENGAWASAN DAN PELAYANAN',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'BALAI LABORATORIUM',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'tipe_kantor' => 'PANGKALAN SARANA OPERASI',
				'created_at' => $now,
				'updated_at' => $now,
			],
		];
		
		RefTipeKantor::insert($data);
	}
}
