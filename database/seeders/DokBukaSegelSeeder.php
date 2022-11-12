<?php

namespace Database\Seeders;

use App\Models\DokBukaSegel;
use App\Models\DokSegel;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokBukaSegelSeeder extends Seeder
{
	use SwitcherTrait;
	use DetailSeederTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'bukasegel';
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
			
		for ($i=1; $i < 21; $i++) { 
			// Get current number for buka segel
			$max_buka_segel = DokBukaSegel::max('no_dok');
			$no_current = $max_buka_segel + 1;
				
			$linked = $this->faker->boolean();
			if ($linked) {
				// Get data segel
				$segel_id = $this->faker->randomElement($available_segel_id);
				if (($key = array_search($segel_id, $available_segel_id)) !== false) {
					unset($available_segel_id[$key]);
				}
				$segel = DokSegel::find($segel_id);
				$segel->update(['kode_status' => 201]);

				// Create BA buka segel
				$buka_segel = DokBukaSegel::create([
					'no_dok' => $no_current,
					'agenda_dok' => $this->agenda,
					'thn_dok' => date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
					'sprint_id' => $this->faker->numberBetween(1,10),
					'jenis_segel' => $segel->jenis_segel,
					'jumlah_segel' => $segel->jumlah_segel,
					'satuan_segel' => $segel->satuan_segel,
					'tempat_segel' => $segel->tempat_segel,
					'nomor_segel' => $segel->nomor_segel,
					'tanggal_segel' => $segel->penindakan->tanggal_penindakan->format('Y-m-d'),
					'saksi_id' => $this->faker->numberBetween(1, 100),
					'petugas1_id' => 1,
					'petugas2_id' => 2,
					'kode_status' => 200,
				]);

				// Create relation Penindakan - Buka Segel
				ObjectRelation::create([
					'object1_type' => 'penindakan',
					'object1_id' => $segel->penindakan->id,
					'object2_type' => 'bukasegel',
					'object2_id' => $buka_segel->id,
				]);
			} else {
				// Create BA buka segel
				$buka_segel = DokBukaSegel::create([
					'no_dok' => $no_current,
					'agenda_dok' => $this->agenda,
					'thn_dok' => date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
					'sprint_id' => $this->faker->numberBetween(1,10),
					'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Lainnya']),
					'jumlah_segel' => $this->faker->numberBetween(1,5),
					'satuan_segel' => $this->faker->randomElement(['lembar', 'buah']),
					'tempat_segel' => $this->faker->word(),
					'nomor_segel' => $this->tipe_surat . '-' . $this->faker->numberBetween(1,100) . '/SEGEL/BC/' . date("Y"),
					'tanggal_segel' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'saksi_id' => $this->faker->numberBetween(1, 100),
					'petugas1_id' => 1,
					'petugas2_id' => 2,
					'kode_status' => 200,
				]);

				// Create penindakan
				$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan']);
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

				$penindakan = Penindakan::create([
					'object_type' => $objek_penindakan,
					'object_id' => $object_id,
				]);

				// Create relation Penindakan - Buka Segel
				ObjectRelation::create([
					'object1_type' => 'penindakan',
					'object1_id' => $penindakan->id,
					'object2_type' => 'bukasegel',
					'object2_id' => $buka_segel->id,
				]);
			}
		}
    }
}
