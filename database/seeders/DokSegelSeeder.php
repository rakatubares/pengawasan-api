<?php

namespace Database\Seeders;

use App\Models\DokSegel;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokSegelSeeder extends Seeder
{
	use SwitcherTrait;
	use DetailSeederTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'segel';
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
			$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan']);

			$penindakan = Penindakan::create([
				'sprint_id' => $this->faker->numberBetween(1,10),
				'tanggal_penindakan' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'lokasi_penindakan' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
			]);

			$max_segel = DokSegel::max('no_dok');
			$no_current = $max_segel + 1;
			$segel = DokSegel::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
				'jumlah_segel' => $this->faker->numberBetween(1,5),
				'satuan_segel' => $this->faker->randomElement(['lembar', 'buah']),
				'tempat_segel' => $this->faker->word(),
				'nomor_segel' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'kode_status' => 200,
			]);

			// Create relation Penindakan - segel
			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'segel',
				'object2_id' => $segel->id,
			]);

			switch ($objek_penindakan) {
				case 'sarkut':
					$object = $this->createSarkut();
					$object_id = $object->id;
					break;

				case 'barang':
					$object = $this->createBarang();
					$object_id = $object->id;
					break;

				case 'bangunan':
					$object = $this->createBangunan();
					$object_id = $object->id;
					break;
				
				default:
					# code...
					break;
			}

			$penindakan->update([
				'object_type' => $objek_penindakan,
				'object_id' => $object_id
			]);
		}
    }
}
