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
				'kode_status' => 104, 
				'short_status' => 'draft buka pengaman',
				'uraian_status' => 'Pembuatan draft BA Pebukaan Tanda Pengaman',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 105, 
				'short_status' => 'draft titip',
				'uraian_status' => 'Pembuatan draft BA Penitipan',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 106, 
				'short_status' => 'draft lap',
				'uraian_status' => 'Pembuatan draft LAP',
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
				'kode_status' => 113, 
				'short_status' => 'draft ni',
				'uraian_status' => 'Pembuatan draft NI',
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
				'kode_status' => 122, 
				'short_status' => 'draft nhin',
				'uraian_status' => 'Pembuatan draft NHI-N',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 123, 
				'short_status' => 'draft nin',
				'uraian_status' => 'Pembuatan draft NI-N',
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
				'kode_status' => 204, 
				'short_status' => 'buka pengaman',
				'uraian_status' => 'Penerbitan BA Tanda Pengaman',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 205, 
				'short_status' => 'titip',
				'uraian_status' => 'Penerbitan BA Penitipan',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 206, 
				'short_status' => 'lap',
				'uraian_status' => 'Penerbitan LAP',
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
				'kode_status' => 213, 
				'short_status' => 'ni',
				'uraian_status' => 'Penerbitan NI',
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
				'kode_status' => 222, 
				'short_status' => 'nhin',
				'uraian_status' => 'Penerbitan NHI-N',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 223, 
				'short_status' => 'nin',
				'uraian_status' => 'Penerbitan NI-N',
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
