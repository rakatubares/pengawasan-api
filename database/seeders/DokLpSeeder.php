<?php

namespace Database\Seeders;

use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\ObjectRelation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		// Get LP ids
		$max_lphp_id = DokLphp::max('id');
		$available_lphp_id = range(1, $max_lphp_id);

		for ($i=1; $i < 6; $i++) { 
			// Get data LPHP
			$lphp_id = $faker->randomElement($available_lphp_id);
			$key = array_search($lphp_id, $available_lphp_id);
			unset($available_lphp_id[$key]);

			// Get current number for LP
			$max_lp = DokLp::max('no_dok');
			$no_current = $max_lp + 1;

			// Pejabat
			$pejabat = [
				'bd.0503' => 4,
				'bd.0504' => 5,
			];
			$jabatan = $faker->randomElement(['bd.0503', 'bd.0504']);
			$pejabat_id = $pejabat[$jabatan];

			// Create LP
			$lp = DokLp::create([
				'no_dok' => $no_current,
				'agenda_dok' => '/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'LP-' . $no_current . '/KPU.03/BD.05/' . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'pasal' => $faker->sentence($nbWOrds = 5),
				'modus' => $faker->sentence($nbWOrds = 20),
				'kode_jabatan' => $jabatan,
				'plh' => false,
				'pejabat_id' => $pejabat_id,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => 'lphp',
				'object1_id' => $lphp_id,
				'object2_type' => 'lp',
				'object2_id' => $lp->id,
			]);

			// Change SBP status
			$sbp = $lp->lphp->lptp->sbp;
			$sbp->update(['kode_status' => 203]);
		}
    }
}
