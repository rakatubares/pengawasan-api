<?php

namespace Database\Seeders;

use App\Models\DokReekspor;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokReeksporSeeder extends Seeder
{
	use SwitcherTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
		$tipe_dok = $this->switchObject('reekspor', 'tipe_dok');
		$agenda = $this->switchObject('reekspor', 'agenda');

		for ($i=1; $i < 21; $i++) { 
			// Get current number
			$max_reekspor = DokReekspor::max('no_dok');
			$no_current = $max_reekspor + 1;

			DokReekspor::create([
				'no_dok' => $no_current,
				'agenda_dok' => $agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_dok . '-' . $no_current . $agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'jenis_dok_asal' => $faker->regexify('[A-Z]{3}'),
				'nomor_dok_asal' => $faker->numberBetween(1, 999999),
				'tanggal_dok_asal' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'jenis_dok_ekspor' => $faker->regexify('[A-Z]{3}'),
				'nomor_dok_ekspor' => $faker->numberBetween(1, 999999),
				'tanggal_dok_ekspor' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'nomor_mawb' => $faker->regexify('[A-Z]{3}[0-9]{8}'),
				'tanggal_mawb' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'nomor_hawb' => $faker->regexify('[A-Z]{3}[0-9]{8}'),
				'tanggal_hawb' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'nama_sarkut' => $faker->company(),
				'nomor_flight' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
				'tanggal_flight' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'nomor_reg_sarkut' => $faker->regexify('[A-Z]{5}'),
				'kedapatan' => $faker->sentence($nbWOrds = 20),
				'saksi_id' => $faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200
			]);
		}
    }
}
