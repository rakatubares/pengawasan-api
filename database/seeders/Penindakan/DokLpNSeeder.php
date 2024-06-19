<?php

namespace Database\Seeders\Penindakan;

use App\Models\Penindakan\DokLphpN;
use App\Models\Penindakan\DokLpN;
use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLpNSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// Get LPHP ids
		$max_lphpn_id = DokLphpN::max('id');
		$available_lphpn_id = range(1, $max_lphpn_id);

		// Current year
		$year = date("Y");

		for ($i=1; $i < 21; $i++) { 
			// Get data LPHP-N
			$lphpn_id = $faker->randomElement($available_lphpn_id);
			$key = array_search($lphpn_id, $available_lphpn_id);
			unset($available_lphpn_id[$key]);
			$lphpn = DokLphpN::find($lphpn_id);
			$chain = $lphpn->chain;
			$lphpn->update(['status_tindak_lanjut' => true]);

			/**
			 * Create LP-N
			 */

			// Get current number for LP-N
			$max_lpn = DokLpN::max('no_dok');
			$crn_lpn = $max_lpn + 1;

			// Create LP
			$creator = $faker->randomElement(['123456', '665544']);

			$lpn = new DokLpN();
			$lpn->no_dok = $crn_lpn;
			$lpn->agenda_dok = $lpn->agenda_dokumen;
			$lpn->thn_dok = $year;
			$lpn->no_dok_lengkap = "{$lpn->tipe_dokumen}-{$crn_lpn}{$lpn->agenda_dokumen}{$year}";
			$lpn->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$lpn->chain_id = $chain->id;
			$lpn->sprint_id = $faker->numberBetween(1,10);
			$lpn->kesimpulan = $faker->sentence($nbWOrds = 20);
			$lpn->kode_status = 'terbit';
			$lpn->created_by = $creator;
			$lpn->updated_by = $creator;
			$lpn->saveQuietly();

			/**
			 * Petugas
			 */

			// Penyusun
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['111', '2222', '147']) : '258';
			$pejabat = ['posisi' => 'penyusun', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0502', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lpn->detail_petugas()->create($pejabat);

			// Atasan
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '555';
			$pejabat = ['posisi' => 'penerbit', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lpn->detail_petugas()->create($pejabat);


			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lpn->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $lpn->tipe_dokumen,
			'agenda' => $lpn->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lpn,
		]);
	}
}
