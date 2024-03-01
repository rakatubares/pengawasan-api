<?php

namespace Database\Seeders\References;

use App\Models\References\RefStatus;
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
				'kode_status' => 'draft',
				'uraian_status' => 'Buat draft dokumen',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 'edit-draft',
				'uraian_status' => 'Edit draft',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[ 
				'kode_status' => 'terbit',
				'uraian_status' => 'Penerbitan',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'tindak-lanjut',
				'uraian_status' => 'Dokumen mendapat tindak lanjut',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'aju-perbaikan',
				'uraian_status' => 'Pengajuan perbaikan',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'setuju-perbaikan',
				'uraian_status' => 'Persetujuan perbaikan',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'tolak-perbaikan',
				'uraian_status' => 'Penolakan perbaikan',
				'color' => 'danger',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'batal-perbaikan',
				'uraian_status' => 'Pembatalan aju perbaikan',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'aju-batal',
				'uraian_status' => 'Pengajuan pembatalan',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'batal',
				'uraian_status' => 'Persetujuan pembatalan',
				'color' => 'danger',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'tolak-batal',
				'uraian_status' => 'Penolakan pembatalan',
				'color' => 'success',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'hapus-batal',
				'uraian_status' => 'Hapus pengajuan pembatalan',
				'color' => 'warning',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kode_status' => 'dihapus',
				'uraian_status' => 'Hapus draft',
				'color' => 'danger',
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefStatus::insert($data);
	}
}
