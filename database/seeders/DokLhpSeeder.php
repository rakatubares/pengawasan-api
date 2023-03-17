<?php

namespace Database\Seeders;

use App\Models\DokLhp;
use App\Models\DokSplit;
use App\Models\ObjectRelation;
use App\Models\RefEntitas;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLhpSeeder extends Seeder
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
		$tipe_dok = 'lhp';
		$tipe_surat = $this->switchObject($tipe_dok, 'tipe_dok');
		$agenda = $this->switchObject($tipe_dok, 'agenda');

		// Get SPLIT ids
		$max_split_id = DokSplit::max('id');
		$available_split_id = range(1, $max_split_id);

		for ($i=1; $i < 11; $i++) { 
			// Get data SPLIT
			$split_id = $faker->randomElement($available_split_id);
			$key = array_search($split_id, $available_split_id);
			unset($available_split_id[$key]);
			$split = DokSplit::find($split_id);

			// Create LHP
			$max_lhp = DokLhp::max('no_dok');
			$crn_lhp = $max_lhp + 1;
			$lhp = DokLhp::create([
				'no_dok' => $crn_lhp,
				'agenda_dok' => '/KPU.305/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $crn_lhp . $agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'kesimpulan' => $faker->text(),
				'alternatif_penyelesaian' => $faker->text(),
				'informasi_lain' => $faker->text(),
				'catatan' => $faker->text(),
				'peneliti_id' => 1,
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
				$lhp->saksi()->attach([$entity_id => ['position' => 'saksi']]);
			}
			
			// Create relation with SPLIT
			ObjectRelation::create([
				'object1_type' => 'split',
				'object1_id' => $split->id,
				'object2_type' => 'lhp',
				'object2_id' => $lhp->id,
			]);

			// Change SPLIT status
			$split->update(['kode_status' => 234]);
		}
	}
}
