<?php

namespace Database\Seeders;

use App\Models\RefSkemaPenindakan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefSkemaPenindakanSeeder extends Seeder
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
				'skema' => 'mandiri',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'dengan bantuan',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'pelimpahan',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'pelimpahan dengan bantuan',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'perbantuan dengan instansi lain',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefSkemaPenindakan::insert($data);
    }
}
