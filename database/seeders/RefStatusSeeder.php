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
				'short_status' => 'draft',
				'uraian_status' => 'Buat dokumen',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 101, 
				'short_status' => 'draft',
				'uraian_status' => 'Edit dokumen',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 200, 
				'short_status' => 'terbit',
				'uraian_status' => 'Terbitkan dokumen' ,
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 210, 
				'short_status' => 'draft buka segel',
				'uraian_status' => 'Buat draft pembukaan segel' ,
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 211, 
				'short_status' => 'buka segel',
				'uraian_status' => 'Penerbitan BA Buka Segel' ,
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 300, 
				'short_status' => 'dihapus',
				'uraian_status' => 'Hapus dokumen',
				'created_at' => $now,
				'updated_at' => $now
			]
		];

		RefStatus::insert($data);
	}
}
