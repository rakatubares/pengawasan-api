<?php

namespace Database\Seeders;

use App\Models\DokLpf;
use App\Models\DokLpp;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLpfSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'lpf';
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
		// Get lpp ids
		$max_lpp_id = DokLpp::max('id');
		$available_lpp_id = range(1, $max_lpp_id);

		for ($i=1; $i < 16; $i++) { 
			// Get data LPP
			$lpp_id = $this->faker->randomElement($available_lpp_id);
			$key = array_search($lpp_id, $available_lpp_id);
			unset($available_lpp_id[$key]);
			$lpp = DokLpp::find($lpp_id);
			
			// Create LPF
			$max_lpf = DokLpf::max('no_dok');
			$crn_lpf = $max_lpf + 1;
			$lpf = DokLpf::create([
				'no_dok' => $crn_lpf,
				'agenda_dok' => '/KPU.305/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $crn_lpf . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'tanggal_bap_saksi' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'tersangka_id' => $lpp->penyidikan->pelaku_id,
				'tanggal_bap_tersangka' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'resume_perkara' => $this->faker->regexify('[A-Z0-9]{5,10}'),
				'tanggal_resume_perkara' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'jenis_dokumen_lain' => $this->faker->regexify('[A-Z]{3,5}'),
				'nomor_dokumen_lain' => $this->faker->regexify('[A-Z0-9]{5,10}'),
				'tanggal_dokumen_lain' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'kesimpulan' => $this->faker->sentence($nbWOrds = 20),
				'usulan' => $this->faker->text(),
				'catatan' => $this->faker->sentence($nbWOrds = 20),
				'peneliti_id' => 1,
				'kode_jabatan1' => 'bd.0505',
				'plh1' => false,
				'pejabat1_id' => 6,
				'kode_jabatan2' => 'bd.05',
				'plh2' => false,
				'pejabat2_id' => 3,
				'kode_status' => 200
			]);

			ObjectRelation::create([
				'object1_type' => 'lpp',
				'object1_id' => $lpp->id,
				'object2_type' => 'lpf',
				'object2_id' => $lpf->id,
			]);

			// Change LPP status
			$lpp->update(['kode_status' => 232]);
		}
	}
}
