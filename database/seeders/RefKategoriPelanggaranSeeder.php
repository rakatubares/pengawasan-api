<?php

namespace Database\Seeders;

use App\Models\RefKategoriPelanggaran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefKategoriPelanggaranSeeder extends Seeder
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
				'kategori' => 'Impor Umum',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Impor Fasilitas',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Impor BKC',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Cukai HT',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Cukai EA/MMEA',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Ekspor',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Tertentu',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Penumpang',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Kiriman/Pos',
				'active' => TRUE,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefKategoriPelanggaran::insert($data);
    }
}
