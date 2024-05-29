<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\DokBukaSegel;
use App\Models\Penindakan\DokSegel;
use App\Models\Penindakan\Penindakan;
use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokBukaSegelSeeder extends Seeder
{
	use ObjekPenindakanSeederTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		// Current year
		$year = date("Y");

		// Get segel ids
		$max_segel_id = DokSegel::max('id');
		$available_segel_id = range(1, $max_segel_id);
			
		for ($i=1; $i < 16; $i++) { 
			// Get current number for buka segel
			$max_buka_segel = DokBukaSegel::max('no_dok');
			$no_current = $max_buka_segel + 1;
				
			// Create Buka Segel
			$creator = $faker->randomElement(['123456', '665544']);

			$buka_segel = new DokBukaSegel();
			$buka_segel->no_dok = $no_current;
			$buka_segel->agenda_dok = $buka_segel->agenda_dokumen;
			$buka_segel->thn_dok = $year;
			$buka_segel->no_dok_lengkap = "{$buka_segel->tipe_dokumen}-{$no_current}{$buka_segel->agenda_dokumen}{$year}";
			$buka_segel->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$buka_segel->sprint_id = $faker->numberBetween(1,10);
			$buka_segel->tanggal_buka_segel = $faker->dateTimeThisYear()->format('Y-m-d');
			$buka_segel->saksi_id = $faker->numberBetween(1,100);
			$buka_segel->kode_status = 'terbit';
			$buka_segel->created_by = $creator;
			$buka_segel->updated_by = $creator;

			$flag_segel = $faker->boolean();
			if ($flag_segel) {
				// Get data segel
				$segel_id = $faker->randomElement($available_segel_id);
				$key = array_search($segel_id, $available_segel_id);
				unset($available_segel_id[$key]);
				$segel = DokSegel::find($segel_id);
				$chain = $segel->chain;
				$segel->update(['kode_status' => 'tindak-lanjut']);

				// Set Segel data
				$buka_segel->chain_id = $chain->id;
				$buka_segel->asal_segel = 'segel';
				$buka_segel->jenis_segel = $segel->jenis_segel;
				$buka_segel->jumlah_segel = $segel->jumlah_segel;
				$buka_segel->satuan_segel = $segel->satuan_segel;
				$buka_segel->tempat_segel = $segel->tempat_segel;
				$buka_segel->nomor_segel = $segel->nomor_segel;
				$buka_segel->tanggal_segel = $segel->chain->penindakan->tanggal_selesai_penindakan->format('Y-m-d');
			} else {
				// Create chain
				$chain = DocumentsChain::create();
				$chain->update(['latest_document' => $buka_segel->kode_dokumen]);

				// Create penindakan
				$penindakan = new Penindakan();
				$penindakan->chain_id = $chain->id;
				$penindakan->save();

				// Set Segel data
				$buka_segel->chain_id = $chain->id;
				$buka_segel->asal_segel = 'input';
				$buka_segel->jenis_segel = $faker->randomElement(['Kertas', 'Timah', 'Lainnya']);
				$buka_segel->jumlah_segel = $faker->numberBetween(1,5);
				$buka_segel->satuan_segel = $faker->randomElement(['lembar', 'buah']);
				$buka_segel->tempat_segel = $faker->word();
				$buka_segel->nomor_segel = 'BA-' . $faker->numberBetween(1,100) . '/SEGEL/BC/' . date("Y");
				$buka_segel->tanggal_segel = $faker->dateTimeThisYear()->format('Y-m-d');

				// Objek penindakan
				$with_sarkut = $faker->boolean();
				if ($with_sarkut) {
					$this->createSarkut($penindakan);
				}

				// Barang
				$with_barang = $faker->boolean();
				if ($with_barang) {
					$this->createBarang($penindakan);
				}

				// Bangunan
				$with_bangunan = $faker->boolean();
				if ($with_bangunan) {
					$this->createBangunan($penindakan);
				}
			}
			$buka_segel->saveQuietly();

			// Petugas
			$petugas1 = [
				'posisi' => 'petugas1', 
				'flag_pejabat' => false, 
				'nip' => '123456',
			];
			$buka_segel->detail_petugas()->create($petugas1);

			$with_petugas2 = $faker->boolean();
			if ($with_petugas2) {
				$petugas2 = [
					'posisi' => 'petugas2', 
					'flag_pejabat' => false, 
					'nip' => '665544',
				];
				$buka_segel->detail_petugas()->create($petugas2);
			}
		}

		Penomoran::create([
			'tipe_dokumen' => $buka_segel->tipe_dokumen,
			'agenda' => $buka_segel->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $no_current,
		]);
    }
}
