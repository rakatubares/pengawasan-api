<?php

namespace Database\Seeders;

use App\Models\RefKategoriBarang;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefKategoriBarangSeeder extends Seeder
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
				"kategori" => "TEKSTIL DAN PRODUK TEKSTIL",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "SEMBAKO (GULA, BERAS, DLL)",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "HANDPHONE DAN ACCESORIES ",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "ELEKTRONIK",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BIJI PLASTIK",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "KENDARAAN BERMOTOR",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "MAKANAN DAN MINUMAN",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "PERHIASAN DAN ACCESSORIES",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "SENJATA DAN BAHAN PELEDAK",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "OBAT-OBATAN DAN BAHAN KIMIA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "CITES",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "HAKI",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "NARKOTIKA DAN PSIKOTROPIKA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BALLPRESS",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BARANG LARTAS LAINNYA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BARANG LAINNYA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "KAYU DAN ROTAN",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "PUPUK",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BAHAN BAKAR MINYAK (BBM)",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "MATA UANG",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "PASIR TIMAH / DARAT",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "HASIL TEMBAKAU ",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "MINUMAN MENGANDUNG ETIL ALKOHOL (MMEA)",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "ETHYL ALKOHOL",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "ALAS KAKI",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "HEWAN DAN BAGIAN TUBUH (NON CITES)",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "PRODUK PERTANIAN, PERKEBUNAN, DAN PERIKANAN",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "TUMBUHAN DAN BAGIAN TUMBUHAN (NON CITES)",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "MINERBA, TANAH, PASIR, DAN TOP SOIL",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BATU MULIA DAN LAINNYA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BESI; BAJA; DAN PRODUKNYA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "MESIN DAN BAGIANNYA",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "ALAT KESEHATAN",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kategori" => "BARANG PORNOGRAFI DAN ALAT BANTU SEKS",
				"active" => true,
				"created_at" => $now,
				"updated_at" => $now
			]
		];

		RefKategoriBarang::insert($data);
    }
}
