<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\RefKategoriBarang;
use App\Models\RefKemasan;
use App\Models\RefSatuan;
use Faker\Factory as Faker;

/**
 * Trait for seeding detail object
 */
trait DetailSeederTrait
{
	public function __construct()
	{
		$this->faker = Faker::create();
	}

	public function createSarkut()
	{
		$sarkut = DetailSarkut::create([
			'nama_sarkut' => $this->faker->company(),
			'jenis_sarkut' => 'Pesawat',
			'no_flight_trayek' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'jumlah_kapasitas' => $this->faker->numberBetween(1, 100),
			'satuan_kapasitas' => $this->faker->regexify('[A-Z]{3}'),
			'pilot_id' => $this->faker->numberBetween(1, 100),
			'bendera' => $this->faker->countryCode(),
			'no_reg_polisi' => $this->faker->regexify('[A-Z]{5}'),
		]);

		return $sarkut;
	}

	public function createBarang($penyidikan=false)
	{
		$max_kemasan_id = RefKemasan::max('id');
		$max_satuan_id = RefSatuan::max('id');
		$max_kategori_id = RefKategoriBarang::max('id');

		$barang = DetailBarang::create([
			'jumlah_kemasan' => $this->faker->numberBetween(1, 100),
			'kemasan_id' => $this->faker->numberBetween(1,$max_kemasan_id),
			'pemilik_id' => $this->faker->numberBetween(1, 100)
		]);

		DetailBarang::find($barang->id)
			->dokumen()
			->create([
				'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
				'no_dok' => $this->faker->numberBetween(1, 999999),
				'tgl_dok' => $this->faker->date()
			]);

		$item_count = $this->faker->numberBetween(1, 10);
		for ($i=0; $i < $item_count; $i++) { 
			$data = [
				'jumlah_barang' => $this->faker->numberBetween(1, 100),
				'satuan_id' => $this->faker->numberBetween(1,$max_satuan_id),
				'uraian_barang' => $this->faker->text(),
				'kategori_id' => $this->faker->numberBetween(1,$max_kategori_id),
			];

			if ($penyidikan) {
				$data['merk'] = $this->faker->sentence($nbwords=3);
				$data['kondisi'] = $this->faker->sentence($nbwords=2);
				$data['tipe'] = $this->faker->sentence($nbwords=5);
				$data['spesifikasi_lain'] = $this->faker->sentence($nbwords=5);
			}

			DetailBarang::find($barang->id)
				->itemBarang()
				->create($data);
		}

		return $barang;
	}

	private function createBangunan()
	{
		$bangunan = DetailBangunan::create([
			'alamat' => $this->faker->address(),
			'no_reg' => $this->faker->regexify('[0-9]{15}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100),
		]);

		return $bangunan;
	}
}
