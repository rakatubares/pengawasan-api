<?php

namespace Database\Seeders;

use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokBukaPengaman;
use App\Models\DokPengaman;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokBukaPengamanSeeder extends Seeder
{
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
		// Get pengaman ids
		$max_pengaman_id = DokPengaman::max('id');
		$available_pengaman_id = range(1, $max_pengaman_id);

		for ($i=1; $i < 11; $i++) { 
			// Get current number for buka segel
			$max_buka_pengaman = DokBukaPengaman::max('no_dok');
			$no_current = $max_buka_pengaman + 1;

			$linked = $this->faker->boolean();
			if ($linked) {
				// Get data pengaman
				$pengaman_id = $this->faker->randomElement($available_pengaman_id);
				if (($key = array_search($pengaman_id, $available_pengaman_id)) !== false) {
					unset($available_pengaman_id[$key]);
				}
				$pengaman = DokPengaman::find($pengaman_id);
				$pengaman->update(['kode_status' => 204]);

				// Create BA buka tanda pengaman
				$buka_pengaman = DokBukaPengaman::create([
					'no_dok' => $no_current,
					'agenda_dok' => '/TANDAPENGAMAN/KPU.03/BD.05/',
					'thn_dok' => date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'no_dok_lengkap' => 'BA-' . $no_current . '/TANDAPENGAMAN/KPU.03/BD.05/' . date("Y"),
					'sprint_id' => $this->faker->numberBetween(1,10),
					'jenis_pengaman' => $pengaman->jenis_pengaman,
					'jumlah_pengaman' => $pengaman->jumlah_pengaman,
					'satuan_pengaman' => $pengaman->satuan_pengaman,
					'tempat_pengaman' => $pengaman->tempat_pengaman,
					'dasar_pengamanan' => $pengaman->alasan_pengamanan,
					'nomor_pengaman' => $pengaman->nomor_pengaman,
					'tanggal_pengaman' => $pengaman->penindakan->tanggal_penindakan->format('Y-m-d'),
					'saksi_id' => $this->faker->numberBetween(1, 100),
					'petugas1_id' => 1,
					'petugas2_id' => 2,
					'kode_status' => 200,
				]);

				// Create relation Penindakan - Buka Segel
				ObjectRelation::create([
					'object1_type' => 'penindakan',
					'object1_id' => $pengaman->penindakan->id,
					'object2_type' => 'bukapengaman',
					'object2_id' => $buka_pengaman->id,
				]);
			} else {
				// Create BA buka tanda pengaman
				$buka_pengaman = DokBukaPengaman::create([
					'no_dok' => $no_current,
					'agenda_dok' => '/TANDAPENGAMAN/KPU.03/BD.05/',
					'thn_dok' => date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'no_dok_lengkap' => 'BA-' . $no_current . '/TANDAPENGAMAN/KPU.03/BD.05/' . date("Y"),
					'sprint_id' => $this->faker->numberBetween(1,10),
					'jenis_pengaman' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
					'jumlah_pengaman' => $this->faker->numberBetween(1,5),
					'satuan_pengaman' => $this->faker->randomElement(['lembar', 'buah']),
					'tempat_pengaman' => $this->faker->word(),
					'dasar_pengamanan' => $this->faker->sentence($nbWOrds = 20),
					'nomor_pengaman' => 'BA-' . $this->faker->numberBetween(1,100) . '/SEGEL/BC/' . date("Y"),
					'tanggal_pengaman' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'saksi_id' => $this->faker->numberBetween(1, 100),
					'petugas1_id' => 1,
					'petugas2_id' => 2,
					'kode_status' => 200,
				]);

				// Create penindakan
				$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang']);
				switch ($objek_penindakan) {
					case 'sarkut':
						$object = $this->createSarkut();
						$object_id = $object->id;
						break;

					case 'barang':
						$object = $this->createBarang();
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

				// Create relation Penindakan - Buka Tanda Pengaman
				ObjectRelation::create([
					'object1_type' => 'penindakan',
					'object1_id' => $penindakan->id,
					'object2_type' => 'bukapengaman',
					'object2_id' => $buka_pengaman->id,
				]);
			}
		}
	}

	private function createSarkut()
	{
		$sarkut = DetailSarkut::create([
			'nama_sarkut' => $this->faker->company(),
			'jenis_sarkut' => 'Pesawat',
			'no_flight_trayek' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'jumlah_kapasitas' => $this->faker->numberBetween(1, 100),
			'satuan_kapasitas' => $this->faker->regexify('[A-Z]{3}'),
			'pilot_id' => $this->faker->numberBetween(1, 100),
			'bendera' => $this->faker->countryCode(),
			'no_reg_polisi' => $this->faker->regexify('[A-Z]{5}'),
		]);

		return $sarkut;
	}

	public function createBarang()
	{
		$barang = DetailBarang::create([
			'jumlah_kemasan' => $this->faker->numberBetween(1, 100),
			'satuan_kemasan' => $this->faker->regexify('[a-z]{2}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100)
		]);

		DetailBarang::find($barang->id)
			->dokumen()
			->create([
				'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
				'no_dok' => $this->faker->numberBetween(1, 999999),
				'tgl_dok' => $this->faker->date()
			]);

		$item_count = $this->faker->numberBetween(1, 10);
		for ($i=0; $i < $item_count; $i++) { 
			DetailBarang::find($barang->id)
				->itemBarang()
				->create([
					'jumlah_barang' => $this->faker->numberBetween(1, 100),
					'satuan_barang' => $this->faker->regexify('[a-z]{2}'),
					'uraian_barang' => $this->faker->text()
				]);
		}

		return $barang;
	}
}
