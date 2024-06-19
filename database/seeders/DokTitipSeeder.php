<?php

namespace Database\Seeders;

use App\Models\DokSegel;
use App\Models\DokTitip;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokTitipSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'titip';
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
		// Get segel ids
		$max_segel_id = DokSegel::max('id');
		$available_segel_id = range(1, $max_segel_id);

		for ($i=1; $i < 11; $i++) { 
			// Get data segel
			$segel_id = $this->faker->randomElement($available_segel_id);
			$key = array_search($segel_id, $available_segel_id);
			unset($available_segel_id[$key]);

			// Get current number for titip
			$max_titip = DokTitip::max('no_dok');
			$no_current = $max_titip + 1;

			// Create titip
			$titip = DokTitip::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $this->faker->numberBetween(1,10),
				'lokasi_titip' => $this->faker->address(),
				'penerima_id' => $this->faker->numberBetween(1, 100),
				'saksi_id' => $this->faker->numberBetween(1, 100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => 'segel',
				'object1_id' => $segel_id,
				'object2_type' => 'titip',
				'object2_id' => $titip->id,
			]);
			
			// Change BA Segel status
			$segel = $titip->segel;
			$segel->update(['kode_status' => 205]);
		}
	}
}
