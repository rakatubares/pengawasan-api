<?php

namespace Database\Seeders;

use App\Models\DokLphpN;
use App\Models\DokLpN;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLpNSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->tipe_dok = 'lpn';
		$this->faker = Faker::create();
		$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get LPHP ids
		$max_lphp_id = DokLphpN::max('id');
		$available_lphp_id = range(1, $max_lphp_id);

		for ($i=1; $i < 6; $i++) { 
			// Get data LPHP
			$lphp_id = $this->faker->randomElement($available_lphp_id);
			$key = array_search($lphp_id, $available_lphp_id);
			unset($available_lphp_id[$key]);

			// Get current number for LP
			$max_lp = DokLpN::max('no_dok');
			$no_current = $max_lp + 1;

			// Pejabat
			$pejabat = [
				'bd.0503' => 4,
				'bd.0504' => 5,
			];
			$jabatan = $this->faker->randomElement(['bd.0503', 'bd.0504']);
			$pejabat_id = $pejabat[$jabatan];

			// Create LP
			$lp = DokLpN::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $this->faker->numberBetween(1,10),
				'kesimpulan' => $this->faker->sentence($nbWOrds = 20),
				'kode_jabatan_penyusun' => $jabatan,
				'plh_penyusun' => false,
				'penyusun_id' => $pejabat_id,
				'kode_jabatan_penerbit' => 'bd.05',
				'plh_penerbit' => false,
				'penerbit_id' => 3,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => 'lphpn',
				'object1_id' => $lphp_id,
				'object2_type' => 'lpn',
				'object2_id' => $lp->id,
			]);

			// Change SBP status
			$sbp = $lp->lphp->lptp->sbp;
			$sbp->update(['kode_status' => 203]);
		}
	}
}
