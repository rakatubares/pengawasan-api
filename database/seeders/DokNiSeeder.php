<?php

namespace Database\Seeders;

use App\Models\DokLkai;
use App\Models\DokNi;
use App\Models\ObjectRelation;
use App\Models\RefTembusan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokNiSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// $faker = Faker::create();
		$tipe_surat = $this->switchObject('ni', 'tipe_dok');
		$agenda = $this->switchObject('ni', 'agenda');

		// Get LKAI ids
		$id_lkai = DokLkai::select('id')->where('kode_status', 200)->get()->toArray();
		$available_lkai_id = array_map(function($d) {return $d['id'];}, $id_lkai);

		for ($d=1; $d < 11; $d++) { 
			$max_ni = DokNi::max('no_dok');
			$crn_ni = $max_ni + 1;

			// Randomize Plh
			$plh_pejabat = $this->faker->boolean();
			if ($plh_pejabat) {
				$pejabat_id = $this->faker->randomElement([4, 5, 6, 7]);
			} else {
				$pejabat_id = 3;
			}

			// Create NI data
			$data_ni = [
				'no_dok' => $crn_ni,
				'agenda_dok' => $agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $crn_ni . $agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'sifat' => $this->faker->randomElement(['segera', 'sangat segera']),
				'klasifikasi' => $this->faker->randomElement(['rahasia', 'sangat rahasia']),
				'tujuan' => $this->faker->randomElement([
					'Kepala Seksi Patroli dan Operasi I',
					'Kepala Seksi Patroli dan Operasi II',
				]),
				'uraian' => $this->createUraian(),
				'kode_jabatan' => 'bd.05',
				'plh_pejabat' => $plh_pejabat,
				'pejabat_id' => $pejabat_id,
				'kode_status' => 200
			];

			// Write NI to database
			$ni = DokNi::create($data_ni);

			// Get data LKAI
			$lkai_id = $this->faker->randomElement($available_lkai_id);
			$key = array_search($lkai_id, $available_lkai_id);
			unset($available_lkai_id[$key]);
			$lkai = DokLkai::find($lkai_id);
			$lkai->update(['kode_status' => 213]);

			// Create relation Intelijen - NHI
			ObjectRelation::create([
				'object1_type' => 'intelijen',
				'object1_id' => $lkai->intelijen->id,
				'object2_type' => 'ni',
				'object2_id' => $ni->id,
			]);

			// Create tembusan
			$cc_sample = ['Direktur P2', 'Kasubdit Intelijen', 'Kepala Kantor', 'PDTA', 'Kabid PFPC'];
			$cc_count = rand(0,3);

			for ($x = 1; $x <= $cc_count; $x++) {
				// Choose CC
				$cc = $this->faker->randomElement($cc_sample);
				$key = array_search($cc, $cc_sample);
				unset($cc_sample[$key]);

				// Check if CC exists in reference
				$cc_data = RefTembusan::where('uraian', $cc)->first();
				if ($cc_data == null) {
					$cc_data = RefTembusan::create(['uraian' => $cc]);
				}

				// Write tembusan
				$ni->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			} 
		}
	}

	// Create random uraian length
	private function createUraian()
	{
		$par_count = rand(1, 3);
		$uraian = '';
		for ($c=0; $c < $par_count; $c++) { 
			$par_length = $this->faker->randomElement([100, 200, 300, 400, 500]);
			$par = $this->faker->text($maxNbChars = $par_length);
			if ($c == 0) {
				$uraian = $par;
			} else {
				$uraian = $uraian . '<br>' . $par;
			}
		}

		return $uraian;
	}
}
