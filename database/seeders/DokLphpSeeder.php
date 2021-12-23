<?php

namespace Database\Seeders;

use App\Models\DokLphp;
use App\Models\Lptp;
use App\Models\ObjectRelation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLphpSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// Get lptp ids
		$max_lptp_id = Lptp::max('id');
		$available_lptp_id = range(1, $max_lptp_id);

		for ($i=1; $i < 11; $i++) { 
			// Get data lptp
			$lptp_id = $faker->randomElement($available_lptp_id);
			$key = array_search($lptp_id, $available_lptp_id);
			unset($available_lptp_id[$key]);

			// Get current number for buka segel
			$max_lphp = DokLphp::max('no_dok');
			$no_current = $max_lphp + 1;

			// Penyusun
			$pejabat = [
				'bd.0503' => 4,
				'bd.0504' => 5,
			];
			$jabatan_penyusun = $faker->randomElement(['bd.0503', 'bd.0504']);
			$penyusun_id = $pejabat[$jabatan_penyusun];

			// Create LPHP
			$lphp = DokLphp::create([
				'no_dok' => $no_current,
				'agenda_dok' => '/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'LPHP-' . $no_current . '/KPU.03/BD.05/' . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'analisa' => $faker->sentence($nbWOrds = 20),
				'catatan' => $faker->sentence($nbWOrds = 20),
				'kode_jabatan_penyusun' => $jabatan_penyusun,
				'plh_penyusun' => false,
				'penyusun_id' => $penyusun_id,
				'kode_jabatan_atasan' => 'bd.05',
				'plh_atasan' => false,
				'atasan_id' => 3,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => 'lptp',
				'object1_id' => $lptp_id,
				'object2_type' => 'lphp',
				'object2_id' => $lphp->id,
			]);

			// Change SBP status
			$sbp = $lphp->lptp->sbp;
			$sbp->update(['kode_status' => 202]);
		}
	}
}
