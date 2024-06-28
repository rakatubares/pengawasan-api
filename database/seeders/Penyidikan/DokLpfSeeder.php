<?php

namespace Database\Seeders\Penyidikan;

use App\Models\Penomoran;
use App\Models\Penyidikan\DokLpf;
use App\Models\Penyidikan\DokLpp;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLpfSeeder extends Seeder
{
	protected $kode_dokumen = 'lpf';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// Current year
		$year = date("Y");

		// Get lpp ids
		$max_lpp_id = DokLpp::max('id');
		$available_lpp_id = range(1, $max_lpp_id);

		for ($i=1; $i < 21; $i++) { 
			// Get data LPP
			$lpp_id = $faker->randomElement($available_lpp_id);
			$key = array_search($lpp_id, $available_lpp_id);
			unset($available_lpp_id[$key]);
			$lpp = DokLpp::find($lpp_id);
			$lpp->followedUp();

			// Get chain
			$chain = $lpp->chain;
			
			// Create LPF
			$creator = $faker->randomElement(['123456', '665544']);

			$max_lpf = DokLpf::max('no_dok');
			$crn_lpf = $max_lpf + 1;

			$lpf = new DokLpf();
			$lpf->no_dok = $crn_lpf;
			$lpf->agenda_dok = $lpf->agenda_dokumen;
			$lpf->thn_dok = $year;
			$lpf->no_dok_lengkap = "{$lpf->tipe_dokumen}-{$crn_lpf}{$lpf->agenda_dokumen}{$year}";
			$lpf->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$lpf->chain_id = $chain->id;
			$lpf->saksi_id = $faker->numberBetween(1,100);
			$lpf->tanggal_bap_saksi = $faker->dateTimeThisYear()->format('Y-m-d');
			$lpf->tersangka_id = $lpp->chain->penyidikan->pelaku_id;
			$lpf->tanggal_bap_tersangka = $faker->dateTimeThisYear()->format('Y-m-d');
			$lpf->resume_perkara = $faker->regexify('[A-Z0-9]{5,10}');
			$lpf->tanggal_resume_perkara = $faker->dateTimeThisYear()->format('Y-m-d');
			$lpf->jenis_dokumen_lain = $faker->regexify('[A-Z]{3,5}');
			$lpf->nomor_dokumen_lain = $faker->regexify('[A-Z0-9]{5,10}');
			$lpf->tanggal_dokumen_lain = $faker->dateTimeThisYear()->format('Y-m-d');
			$lpf->kesimpulan = $faker->sentence($nbWOrds = 20);
			$lpf->usulan = $faker->text();
			$lpf->catatan = $faker->sentence($nbWOrds = 20);
			$lpf->kode_status = 'terbit';
			$lpf->created_by = $creator;
			$lpf->updated_by = $creator;
			$lpf->saveQuietly();

			/**
			 * Petugas
			 */

			// Petugas
			$penyusun = [
				'posisi' => 'peneliti', 
				'flag_pejabat' => false, 
				'nip' => '123456',
			];
			$lpf->detail_petugas()->create($penyusun);

			// Atasan 1
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '74158';
			$pejabat = [
				'posisi' => 'atasan1', 
				'flag_pejabat' => true, 
				'kode_jabatan' => 'bd.0505', 
				'tipe_ttd' => $tipe_ttd, 
				'nip' => $nip_pejabat
			];
			$lpf->detail_petugas()->create($pejabat);

			// Atasan 2
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '555';
			$pejabat = [
				'posisi' => 'atasan2', 
				'flag_pejabat' => true, 
				'kode_jabatan' => 'bd.05', 
				'tipe_ttd' => $tipe_ttd, 
				'nip' => $nip_pejabat
			];
			$lpf->detail_petugas()->create($pejabat);

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lpf->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $lpf->tipe_dokumen,
			'agenda' => $lpf->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lpf,
		]);
	}
}
