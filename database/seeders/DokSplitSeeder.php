<?php

namespace Database\Seeders;

use App\Models\DokLpf;
use App\Models\DokSplit;
use App\Models\ObjectRelation;
use App\Models\RefTembusan;
use App\Models\RefUserCache;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokSplitSeeder extends Seeder
{
	use SwitcherTrait;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		$tipe_surat = $this->switchObject('split', 'tipe_dok');
		$agenda = $this->switchObject('split', 'agenda');

		// Get LPF ids
		$max_lpf_id = DokLpf::max('id');
		$available_lpf_id = range(1, $max_lpf_id);

		for ($i=1; $i < 6; $i++) { 
			// Get data LPF
			$lpf_id = $faker->randomElement($available_lpf_id);
			$key = array_search($lpf_id, $available_lpf_id);
			unset($available_lpf_id[$key]);
			$lpf = DokLpf::find($lpf_id);

			// Create SPLIT
			$max_split = DokSplit::max('no_dok');
			$crn_split = $max_split + 1;
			$split = DokSplit::create([
				'no_dok' => $crn_split,
				'agenda_dok' => '/KPU.305/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $crn_split . $agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'dugaan_pelanggaran' => $faker->text(),
				'kode_jabatan' => 'bd.0505',
				'plh' => false,
				'pejabat_id' => 6,
				'kode_status' => 200
			]);

			// Add oficer
			$max_user_id = RefUserCache::max('user_id');
			$available_user_id = range(1, $max_user_id);
			$officer_count = rand(1,3);
			for ($o=1; $o < $officer_count; $o++) { 
				$user_id = $faker->randomElement($available_user_id);
				$key = array_search($user_id, $available_user_id);
				unset($available_user_id[$key]);
				$split->petugas()->attach([$user_id => ['position' => 'petugas']]);
			}

			// Create tembusan
			$cc_sample = ['Direktur P2', 'Kasubdit Intelijen', 'Kepala Kantor', 'PDTA', 'Kabid PFPC'];
			$cc_count = rand(0,3);

			for ($x = 1; $x <= $cc_count; $x++) {
				// Choose CC
				$cc = $faker->randomElement($cc_sample);
				$key = array_search($cc, $cc_sample);
				unset($cc_sample[$key]);

				// Check if CC exists in reference
				$cc_data = RefTembusan::where('uraian', $cc)->first();
				if ($cc_data == null) {
					$cc_data = RefTembusan::create(['uraian' => $cc]);
				}

				// Write tembusan
				$split->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			}

			// Create relation with LPF
			ObjectRelation::create([
				'object1_type' => 'lpf',
				'object1_id' => $lpf->id,
				'object2_type' => 'split',
				'object2_id' => $split->id,
			]);

			// Change LPF status
			$lpf->update(['kode_status' => 233]);
		}
	}
}
