<?php

namespace Database\Seeders;

use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLpSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->tipe_dok = 'lp';
		$this->tipe_lphp = 'lphp';
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->faker = Faker::create();
		$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
		$this->model = $this->switchObject($this->tipe_dok, 'model');
		$this->model_lphp = $this->switchObject($this->tipe_lphp, 'model');
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get LPHP ids
		$max_lphp_id = $this->model_lphp::max('id');
		$available_lphp_id = range(1, $max_lphp_id);

		for ($i=1; $i < 31; $i++) { 
			// Get data LPHP
			$lphp_id = $this->faker->randomElement($available_lphp_id);
			$key = array_search($lphp_id, $available_lphp_id);
			unset($available_lphp_id[$key]);

			// Get current number for LP
			$max_lp = $this->model::max('no_dok');
			$no_current = $max_lp + 1;

			// Pejabat
			$pejabat = [
				'bd.0503' => 4,
				'bd.0504' => 5,
			];
			$jabatan = $this->faker->randomElement(['bd.0503', 'bd.0504']);
			$pejabat_id = $pejabat[$jabatan];

			// Create LP
			$lp = $this->model::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'pasal' => $this->faker->sentence($nbWOrds = 5),
				'modus' => $this->faker->sentence($nbWOrds = 20),
				'kode_jabatan' => $jabatan,
				'plh' => false,
				'pejabat_id' => $pejabat_id,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => $this->tipe_lphp,
				'object1_id' => $lphp_id,
				'object2_type' => $this->tipe_dok,
				'object2_id' => $lp->id,
			]);

			// Change SBP status
			$sbp = $lp->lphp->lptp->sbp;
			$sbp->update(['kode_status' => 203]);
		}
	}
}
