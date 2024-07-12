<?php

namespace Database\Seeders\References;

use App\Models\References\RefSkemaPenindakan;
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
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'dengan bantuan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'pelimpahan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'pelimpahan dengan bantuan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'skema' => 'perbantuan dengan instansi lain',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefSkemaPenindakan::insert($data);
    }
}
