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
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 101, 
				'short_status' => 'draft buka segel',
				'uraian_status' => 'Pembuatan draft BA Buka Segel',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 102, 
				'short_status' => 'draft lphp',
				'uraian_status' => 'Pembuatan draft LPHP',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 111, 
				'short_status' => 'draft lkai',
				'uraian_status' => 'Pembuatan draft LKAI',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 112, 
				'short_status' => 'draft nhi',
				'uraian_status' => 'Pembuatan draft NHI',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 121, 
				'short_status' => 'draft lkain',
				'uraian_status' => 'Pembuatan draft LKAI-N',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 200, 
				'short_status' => 'terbit',
				'uraian_status' => 'Terbitkan dokumen' ,
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 201, 
				'short_status' => 'buka segel',
				'uraian_status' => 'Penerbitan BA Buka Segel',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 202, 
				'short_status' => 'lphp',
				'uraian_status' => 'Penerbitan LPHP',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 211, 
				'short_status' => 'lkai',
				'uraian_status' => 'Penerbitan LKAI',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 212, 
				'short_status' => 'nhi',
				'uraian_status' => 'Penerbitan NHI',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 221, 
				'short_status' => 'lkain',
				'uraian_status' => 'Penerbitan LKAI-N',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 300, 
				'short_status' => 'dihapus',
				'uraian_status' => 'Hapus dokumen',
				'color' => 'danger',
				'created_at' => $now,
				'updated_at' => $now
			]
		];

		RefStatus::insert($data);
	}
}
