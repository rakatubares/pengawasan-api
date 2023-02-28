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
				'kode_status' => 103, 
				'short_status' => 'draft lp',
				'uraian_status' => 'Pembuatan draft LP',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 131, 
				'short_status' => 'draft lpp',
				'uraian_status' => 'Pembuatan draft LPP',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 132, 
				'short_status' => 'draft lpf',
				'uraian_status' => 'Pembuatan draft LPF',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 133, 
				'short_status' => 'draft split',
				'uraian_status' => 'Pembuatan draft SPLIT',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 134, 
				'short_status' => 'draft lhp',
				'uraian_status' => 'Pembuatan draft LHP',
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
				'kode_status' => 203,
				'short_status' => 'lp',
				'uraian_status' => 'Penerbitan LP',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 231,
				'short_status' => 'lpp',
				'uraian_status' => 'Penerbitan LPP',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 232,
				'short_status' => 'lpf',
				'uraian_status' => 'Penerbitan LPF',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 233,
				'short_status' => 'split',
				'uraian_status' => 'Penerbitan SPLIT',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 234,
				'short_status' => 'lhp',
				'uraian_status' => 'Penerbitan LHP',
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
