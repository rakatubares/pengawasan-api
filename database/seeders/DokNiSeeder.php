<?php

namespace Database\Seeders;

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
		$this->tipe_ni = 'ni';
		$this->tipe_lkai = 'lkai';
		$this->status_lkai = 213;
		$this->prepareModel();
	}

	public function prepareModel()
	{
		$this->faker = Faker::create();
		$this->tipe_surat = $this->switchObject($this->tipe_ni, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_ni, 'agenda');
		$this->model_ni = $this->switchObject($this->tipe_ni, 'model');
		$this->model_lkai = $this->switchObject($this->tipe_lkai, 'model');
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get LKAI ids
		$id_lkai = $this->model_lkai::select('id')->where('kode_status', 200)->get()->toArray();
		$available_lkai_id = array_map(function($d) {return $d['id'];}, $id_lkai);

		for ($d=1; $d < 11; $d++) { 
			$max_ni = $this->model_ni::max('no_dok');
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
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $crn_ni . $this->agenda . date("Y"),
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
			$ni = $this->model_ni::create($data_ni);

			// Get data LKAI
			$lkai_id = $this->faker->randomElement($available_lkai_id);
			$key = array_search($lkai_id, $available_lkai_id);
			unset($available_lkai_id[$key]);
			$lkai = $this->model_lkai::find($lkai_id);
			$lkai->update(['kode_status' => $this->status_lkai]);

			// Create relation Intelijen - NHI
			ObjectRelation::create([
				'object1_type' => 'intelijen',
				'object1_id' => $lkai->intelijen->id,
				'object2_type' => $this->tipe_ni,
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
		$paragraphs = [];
		for ($c=0; $c < $par_count; $c++) { 
			$par_length = $this->faker->randomElement([100, 200, 300, 400, 500]);
			$par = $this->faker->text($maxNbChars = $par_length);
			$paragraphs[] = $par;
		}
		$uraian = implode(PHP_EOL.PHP_EOL , $paragraphs);;

		return $uraian;
	}
}
