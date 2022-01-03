<?php

namespace Database\Seeders;

use App\Models\RefJabatan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefJabatanSeeder extends Seeder
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
				'parent_id' => null,
				'level' => 1,
				'kode' => 'kpu.03',
				'jabatan' => 'Kepala Kantor',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 1,
				'level' => 2,
				'kode' => 'bd.05',
				'jabatan' => 'Kepala Bidang Penindakan dan Penyidikan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'level' => 3,
				'kode' => 'bd.0501',
				'jabatan' => 'Kepala Seksi Intelijen I',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'level' => 3,
				'kode' => 'bd.0502',
				'jabatan' => 'Kepala Seksi Intelijen II',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'level' => 3,
				'kode' => 'bd.0503',
				'jabatan' => 'Kepala Seksi Patroli dan Operasi I',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'level' => 3,
				'kode' => 'bd.0504',
				'jabatan' => 'Kepala Seksi Patroli dan Operasi II',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'level' => 3,
				'kode' => 'bd.0505',
				'jabatan' => 'Kepala Seksi Penyidikan dan Barang Hasil Penindakan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'level' => 3,
				'kode' => 'bd.0506',
				'jabatan' => 'Kepala Seksi Sarana Operasi',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefJabatan::insert($data);
    }
}
