<?php

namespace App\Traits;

use App\Models\References\RefKategoriBarang;
use App\Models\References\RefSatuan;
use Faker\Factory as Faker;

trait BarangTrait
{
	public function seedBarang($parent) {
		$faker = Faker::create();
		$max_satuan_id = RefSatuan::max('id');
		$max_kategori_id = RefKategoriBarang::max('id');

		$item_count = $faker->numberBetween(1, 10);
		for ($i=0; $i < $item_count; $i++) { 
			$with_bruto = $faker->boolean();
			$parent->barang()->create([
				'jumlah_barang' => $faker->numberBetween(1, 100),
				'satuan_id' => $faker->numberBetween(1,$max_satuan_id),
				'uraian_barang' => $faker->text(),
				'kategori_id' => $faker->numberBetween(1,$max_kategori_id),
				'berat' => $with_bruto ? $faker->randomFloat(min:0, max:100) : null,
				'satuan_berat' => $with_bruto ? $faker->randomElement(['KG', 'GRAM', 'TON']) : null,
			]);
		}
	}
}