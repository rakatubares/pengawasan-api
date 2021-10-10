<?php

namespace Database\Seeders;

use App\Models\SbpBarangDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpBarangDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

        for ($i=1; $i <= 5; $i++) { 
			$count_barang = $faker->numberBetween(1, 10);

			for ($b=1; $b <= $count_barang; $b++) { 
				SbpBarangDetail::create([
					'sbp_barang_id' => $i,
					'jumlah_barang' => $faker->numberBetween(1, 100),
					'satuan_barang' => $faker->regexify('[a-z]{2}'),
					'uraian_barang' => $faker->sentence($nbWOrds = 5),
				]);
			}
		}
    }
}
