<?php

namespace Database\Seeders;

use App\Models\RefStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefStatusSeeder extends Seeder
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
				'kode_status' => 100, 
				'uraian_status' => 'Buat dokumen',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 200, 
				'uraian_status' => 'Terbitkan dokumen' ,
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 300, 
				'uraian_status' => 'Hapus dokumen',
				'created_at' => $now,
				'updated_at' => $now
			]
		];

		RefStatus::insert($data);
    }
}
