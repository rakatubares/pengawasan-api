<?php

namespace Database\Seeders;

use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLphpSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->tipe_dok = 'lphp';
		$this->tipe_lptp = 'lptp';
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->faker = Faker::create();
		$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
		$this->model = $this->switchObject($this->tipe_dok, 'model');
		$this->model_lptp = $this->switchObject($this->tipe_lptp, 'model');
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get lptp ids
		$max_lptp_id = $this->model_lptp::max('id');
		$available_lptp_id = range(1, $max_lptp_id);

		for ($i=1; $i < 41; $i++) { 
			// Get data lptp
			$lptp_id = $this->faker->randomElement($available_lptp_id);
			$key = array_search($lptp_id, $available_lptp_id);
			unset($available_lptp_id[$key]);

			// Get current number for buka segel
			$max_lphp = $this->model::max('no_dok');
			$no_current = $max_lphp + 1;

			// Penyusun
			$pejabat = [
				'bd.0503' => 4,
				'bd.0504' => 5,
			];
			$jabatan_penyusun = $this->faker->randomElement(['bd.0503', 'bd.0504']);
			$penyusun_id = $pejabat[$jabatan_penyusun];

			// Create LPHP
			$lphp = $this->model::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'analisa' => $this->faker->sentence($nbWOrds = 20),
				'catatan' => $this->faker->sentence($nbWOrds = 20),
				'kode_jabatan_penyusun' => $jabatan_penyusun,
				'plh_penyusun' => false,
				'penyusun_id' => $penyusun_id,
				'kode_jabatan_atasan' => 'bd.05',
				'plh_atasan' => false,
				'atasan_id' => 3,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => $this->tipe_lptp,
				'object1_id' => $lptp_id,
				'object2_type' => $this->tipe_dok,
				'object2_id' => $lphp->id,
			]);

			// Change SBP status
			$sbp = $lphp->lptp->sbp;
			$sbp->update(['kode_status' => 202]);
		}
	}
}
