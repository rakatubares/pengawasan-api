<?php

namespace Database\Seeders\References;

use App\Models\References\RefKategoriPelanggaran;
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
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Impor Fasilitas',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Impor BKC',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Cukai HT',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Cukai EA/MMEA',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Ekspor',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Larangan Pembatasan',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Tertentu',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Penumpang',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'kategori' => 'Barang Kiriman/Pos',
				'active' => true,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefKategoriPelanggaran::insert($data);
    }
}
