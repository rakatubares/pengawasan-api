<?php

namespace Database\Seeders\Penindakan;

use App\Models\Penindakan\DokLpt;
use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokLptSeeder extends Seeder
{
	protected $kode_dokumen = 'lpt';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		// Get sbp ids
		$model_sbp = Relation::getMorphedModel('sbp');
		$max_sbp_id = $model_sbp::max('id');
		$available_sbp_id = range(1, $max_sbp_id);

		// Current year
		$year = date("Y");

		for ($i=1; $i < 16; $i++) { 
			// Get data sbp
			$sbp = null;
			while ($sbp == null) {
				if (sizeof($available_sbp_id) > 0) {
					$sbp_id = $faker->randomElement($available_sbp_id);
					$key = array_search($sbp_id, $available_sbp_id);
					unset($available_sbp_id[$key]);
					$sbp_object = $model_sbp::find($sbp_id);
					if (!$sbp_object->chain->nhi) {
						$sbp = $sbp_object;
					}
				} else {
					break;
				}
			}
			
			if ($sbp != null) {
				$chain = $sbp->chain;
				$sbp->update(['status_lpt' => true]);
			}

			/**
			 * Create LPT
			 */

			//  Get max LPT
			$max_lpt = DokLpt::max('no_dok');
			$crn_lpt = $max_lpt + 1;
			$tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');

			// Create LPT
			$creator = $faker->randomElement(['123456', '665544']);

			$lpt = new DokLpt();
			$lpt->no_dok = $crn_lpt;
			$lpt->agenda_dok = $lpt->agenda_dokumen;
			$lpt->thn_dok = $year;
			$lpt->no_dok_lengkap = "{$lpt->tipe_dokumen}-{$crn_lpt}{$lpt->agenda_dokumen}{$year}";
			$lpt->tanggal_dokumen = $tanggal_dokumen;
			$lpt->chain_id = $chain->id;
			$lpt->barang = $faker->sentence($nbWOrds = 5);
			$lpt->sarpras = $faker->sentence($nbWOrds = 10);
			$lpt->kronologi = $faker->sentence($nbWOrds = 30);
			$lpt->kode_status = 'terbit';
			$lpt->created_by = $creator;
			$lpt->updated_by = $creator;
			$lpt->saveQuietly();

			/**
			 * Petugas
			 */

			// Pejabat
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147']) : '111';
			$pejabat = ['posisi' => 'pejabat', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0503', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lpt->detail_petugas()->create($pejabat);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $lpt->tipe_dokumen,
			'agenda' => $lpt->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lpt,
		]);
    }
}
