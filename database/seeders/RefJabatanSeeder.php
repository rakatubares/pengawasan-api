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
				'jabatan' => 'Kepala Kantor',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 1,
				'jabatan' => 'Kepala Bidang Penindakan dan Penyidikan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'jabatan' => 'Kepala Seksi Intelijen I',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'jabatan' => 'Kepala Seksi Intelijen II',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'jabatan' => 'Kepala Seksi Patroli dan Operasi I',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'jabatan' => 'Kepala Seksi Patroli dan Operasi II',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'jabatan' => 'Kepala Seksi Penyidikan dan Barang Hasil Penindakan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'parent_id' => 2,
				'jabatan' => 'Kepala Seksi Sarana Operasi',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefJabatan::insert($data);
    }
}
