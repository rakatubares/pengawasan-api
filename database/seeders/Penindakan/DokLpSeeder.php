<?php

namespace Database\Seeders\Penindakan;

use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokLpSeeder extends Seeder
{
	public function __construct($kode_dokumen='lp')
	{
		$this->kode_dokumen = $kode_dokumen;
		$this->model_lp = Relation::getMorphedModel($this->kode_dokumen);
		$lp = new $this->model_lp;
		$this->kode_lphp = $lp->kode_lphp;
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// Get LPHP ids
		$model_lphp = Relation::getMorphedModel($this->kode_lphp);
		$max_lphp_id = $model_lphp::max('id');
		$available_lphp_id = range(1, $max_lphp_id);

		// Current year
		$year = date("Y");

		for ($i=1; $i < 21; $i++) { 
			// Get data LPHP
			$lphp_id = $faker->randomElement($available_lphp_id);
			$key = array_search($lphp_id, $available_lphp_id);
			unset($available_lphp_id[$key]);
			$lphp = $model_lphp::find($lphp_id);
			$chain = $lphp->chain;
			$lphp->update(['status_tindak_lanjut' => true]);

			/**
			 * Create LP
			 */
			
			// Get current number for LP
			$max_lp = $this->model_lp::max('no_dok');
			$crn_lp = $max_lp + 1;

			// Create LP
			$creator = $faker->randomElement(['123456', '665544']);

			$lp = new $this->model_lp;
			$lp->no_dok = $crn_lp;
			$lp->agenda_dok = $lp->agenda_dokumen;
			$lp->thn_dok = $year;
			$lp->no_dok_lengkap = "{$lp->tipe_dokumen}-{$crn_lp}{$lp->agenda_dokumen}{$year}";
			$lp->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$lp->chain_id = $chain->id;
			$lp->pasal = $faker->sentence($nbWOrds = 5);
			$lp->modus = $faker->sentence($nbWOrds = 20);
			$lp->kode_status = 'terbit';
			$lp->created_by = $creator;
			$lp->updated_by = $creator;
			$lp->saveQuietly();

			/**
			 * Petugas
			 */

			// Pejabat
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147']) : '111';
			$pejabat = ['posisi' => 'pejabat', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0503', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lp->detail_petugas()->create($pejabat);

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lp->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $lp->tipe_dokumen,
			'agenda' => $lp->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lp,
		]);
	}
}
