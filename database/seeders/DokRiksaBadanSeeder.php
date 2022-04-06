<?php

namespace Database\Seeders;

use App\Models\DokRiksaBadan;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Models\RefLokasi;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokRiksaBadanSeeder extends Seeder
{
	use SwitcherTrait;
	use DetailSeederTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'riksabadan';
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
		for ($i=1; $i < 21; $i++) { 
			$max_lokasi_id = RefLokasi::max('id');

			$penindakan = Penindakan::create([
				'sprint_id' => $this->faker->numberBetween(1,10),
				'object_type' => 'orang',
				'object_id' => $this->faker->numberBetween(1,100),
				'tanggal_penindakan' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'grup_lokasi_id' => $this->faker->numberBetween(1,$max_lokasi_id),
				'lokasi_penindakan' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
			]);

			$sarkut = $this->createSarkut();
			$max_riksa_badan = DokRiksaBadan::max('no_dok');
			$no_current = $max_riksa_badan + 1;
			$riksa_badan = DokRiksaBadan::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'asal' => $this->faker->country(),
				'tujuan' => $this->faker->address(),
				'pendamping_id' => $this->faker->numberBetween(1,100),
				'sarkut_id' => $sarkut->id,
				'uraian_pemeriksaan' => $this->faker->sentence($nbWOrds = 20),
				'hasil_pemeriksaan' => $this->faker->sentence($nbWOrds = 20),
				'kode_status' => 200,
			]);

			// Create detail dokumen barang yg dibawa
			DokRiksaBadan::find($riksa_badan->id)
				->dokumen()
				->create([
					'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
					'no_dok' => $this->faker->numberBetween(1, 999999),
					'tgl_dok' => $this->faker->date()
				]);

			// Create relation Penindakan - periksa
			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'riksabadan',
				'object2_id' => $riksa_badan->id,
			]);
		}
	}
}
