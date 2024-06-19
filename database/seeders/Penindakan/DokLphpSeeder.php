<?php

namespace Database\Seeders\Penindakan;

use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokLphpSeeder extends Seeder
{
	protected $kode_dokumen = 'lphp';

	public function __construct()
	{
		$this->model_lphp = Relation::getMorphedModel($this->kode_dokumen);
		$lphp = new $this->model_lphp;
		$this->kode_lptp = $lphp->kode_lptp;
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// Get lptp ids
		$model_lptp = Relation::getMorphedModel($this->kode_lptp);
		$max_lptp_id = $model_lptp::max('id');
		$available_lptp_id = range(1, $max_lptp_id);

		// Current year
		$year = date("Y");

		for ($i=1; $i < 31; $i++) { 
			// Get data lptp
			$lptp_id = $faker->randomElement($available_lptp_id);
			$key = array_search($lptp_id, $available_lptp_id);
			unset($available_lptp_id[$key]);
			$lptp = $model_lptp::find($lptp_id);
			$chain = $lptp->chain;
			$lptp->update(['status_tindak_lanjut' => true]);

			/**
			 * Create LPHP
			 */
			$max_lphp = $this->model_lphp::max('no_dok');
			$crn_lphp = $max_lphp + 1;
			$tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');

			// Create LPHP
			$creator = $faker->randomElement(['123456', '665544']);

			$lphp = new $this->model_lphp;
			$lphp->no_dok = $crn_lphp;
			$lphp->agenda_dok = $lphp->agenda_dokumen;
			$lphp->thn_dok = $year;
			$lphp->no_dok_lengkap = "{$lphp->tipe_dokumen}-{$crn_lphp}{$lphp->agenda_dokumen}{$year}";
			$lphp->tanggal_dokumen = $tanggal_dokumen;
			$lphp->chain_id = $chain->id;
			$lphp->analisa = $faker->sentence($nbWOrds = 20);
			$lphp->catatan = $faker->sentence($nbWOrds = 20);
			$lphp->kode_status = 'terbit';
			$lphp->created_by = $creator;
			$lphp->updated_by = $creator;
			$lphp->saveQuietly();

			/**
			 * Petugas
			 */

			// Penyusun
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147']) : '111';
			$pejabat = ['posisi' => 'penyusun', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0503', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lphp->detail_petugas()->create($pejabat);

			// Atasan
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '555';
			$pejabat = ['posisi' => 'atasan', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lphp->detail_petugas()->create($pejabat);

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lphp->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $lphp->tipe_dokumen,
			'agenda' => $lphp->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lphp,
		]);
	}
}
