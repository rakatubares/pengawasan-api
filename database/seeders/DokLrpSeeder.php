<?php

namespace Database\Seeders;

use App\Models\DokLhp;
use App\Models\DokLp;
use App\Models\DokLrp;
use App\Models\ObjectRelation;
use App\Models\RefEntitas;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLrpSeeder extends Seeder
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
		$tipe_dok = 'lrp';
		$tipe_surat = $this->switchObject($tipe_dok, 'tipe_dok');
		$agenda = $this->switchObject($tipe_dok, 'agenda');

		// Get LHP ids
		$max_lhp_id = DokLhp::max('id');
		$available_lhp_id = range(1, $max_lhp_id);
		
		for ($i=1; $i < 6; $i++) { 
			// Get data LHP
			$lhp_id = $faker->randomElement($available_lhp_id);
			$key = array_search($lhp_id, $available_lhp_id);
			unset($available_lhp_id[$key]);
			$lhp = DokLp::find($lhp_id);

			// Create LRP
			$with_lk = rand(0,1);
			if ($with_lk) {
				$no_lk = $faker->regexify('LK-[0-9]{3,5}');
				$tanggal_lk = $faker->dateTimeThisYear()->format('Y-m-d');
			} else {
				$no_lk = null;
				$tanggal_lk = null;
			}

			$with_sptp = rand(0,1);
			if ($with_sptp) {
				$no_sptp = $faker->regexify('SPTP-[0-9]{3,5}');
				$tanggal_sptp = $faker->dateTimeThisYear()->format('Y-m-d');
			} else {
				$no_sptp = null;
				$tanggal_sptp = null;
			}

			$with_spdp = rand(0,1);
			if ($with_spdp) {
				$no_spdp = $faker->regexify('SPDP-[0-9]{3,5}');
				$tanggal_spdp = $faker->dateTimeThisYear()->format('Y-m-d');
			} else {
				$no_spdp = null;
				$tanggal_spdp = null;
			}

			$max_lrp = DokLrp::max('no_dok');
			$crn_lrp = $max_lrp + 1;
			$lrp = DokLrp::create([
				'no_dok' => $crn_lrp,
				'agenda_dok' => '/KPU.305/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $crn_lrp . $agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'no_lk' => $no_lk,
				'tanggal_lk' => $tanggal_lk,
				'no_sptp' => $no_sptp,
				'tanggal_sptp' => $tanggal_sptp,
				'no_spdp' => $no_spdp,
				'tanggal_spdp' => $tanggal_spdp,
				'alat_bukti_surat' => $faker->text(),
				'alat_bukti_petunjuk' => $faker->text(),
				'alternatif_penyelesaian' => $faker->text(),
				'informasi_lain' => $faker->text(),
				'catatan' => $faker->text(),
				'penyidik_id' => 1,
				'kode_jabatan1' => 'bd.0505',
				'plh1' => false,
				'pejabat1_id' => 6,
				'kode_jabatan2' => 'bd.05',
				'plh2' => false,
				'pejabat2_id' => 3,
				'kode_status' => 200
			]);

			// Add saksi
			$max_entity_id = RefEntitas::max('id');
			$available_entity_id = range(1, $max_entity_id);
			$entity_count = rand(0,5);
			for ($o=1; $o <= $entity_count; $o++) { 
				$entity_id = $faker->randomElement($available_entity_id);
				$key = array_search($entity_id, $available_entity_id);
				unset($available_entity_id[$key]);
				$lrp->saksi()->attach([$entity_id => ['position' => 'saksi']]);
			}

			// Add ahli
			$max_entity_id = RefEntitas::max('id');
			$available_entity_id = range(1, $max_entity_id);
			$entity_count = rand(0,5);
			for ($o=1; $o <= $entity_count; $o++) { 
				$entity_id = $faker->randomElement($available_entity_id);
				$key = array_search($entity_id, $available_entity_id);
				unset($available_entity_id[$key]);
				$lrp->ahli()->attach([$entity_id => ['position' => 'ahli']]);
			}

			// Create relation with LP
			ObjectRelation::create([
				'object1_type' => 'lhp',
				'object1_id' => $lhp->id,
				'object2_type' => 'lrp',
				'object2_id' => $lrp->id,
			]);

			// Change LP status
			$lhp->update(['kode_status' => 232]);
		}
	}
}
