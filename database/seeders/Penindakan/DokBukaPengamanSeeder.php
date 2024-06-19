<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\DokBukaPengaman;
use App\Models\Penindakan\DokPengaman;
use App\Models\Penindakan\Penindakan;
use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokBukaPengamanSeeder extends Seeder
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

		// Get pengaman ids
		$max_pengaman_id = DokPengaman::max('id');
		$available_pengaman_id = range(1, $max_pengaman_id);

		for ($i=1; $i < 11; $i++) { 
			// Get current number for buka pengaman
			$max_buka_pengaman = DokBukaPengaman::max('no_dok');
			$no_current = $max_buka_pengaman + 1;

			// Create Buka pengaman
			$creator = $faker->randomElement(['123456', '665544']);

			$buka_pengaman = new DokBukaPengaman();
			$buka_pengaman->no_dok = $no_current;
			$buka_pengaman->agenda_dok = $buka_pengaman->agenda_dokumen;
			$buka_pengaman->thn_dok = $year;
			$buka_pengaman->no_dok_lengkap = "{$buka_pengaman->tipe_dokumen}-{$no_current}{$buka_pengaman->agenda_dokumen}{$year}";
			$buka_pengaman->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$buka_pengaman->sprint_id = $faker->numberBetween(1,10);
			$buka_pengaman->tanggal_buka_pengaman = $faker->dateTimeThisYear()->format('Y-m-d');
			$buka_pengaman->saksi_id = $faker->numberBetween(1,100);
			$buka_pengaman->kode_status = 'terbit';
			$buka_pengaman->created_by = $creator;
			$buka_pengaman->updated_by = $creator;

			$flag_pengaman = $faker->boolean();
			if ($flag_pengaman) {
				// Get data segel
				$pengaman_id = $faker->randomElement($available_pengaman_id);
				$key = array_search($pengaman_id, $available_pengaman_id);
				unset($available_pengaman_id[$key]);
				$pengaman = DokPengaman::find($pengaman_id);
				$chain = $pengaman->chain;
				$pengaman->update(['status_buka' => true]);

				// Set Segel data
				$buka_pengaman->chain_id = $chain->id;
				$buka_pengaman->asal_pengaman = 'pengaman';
				$buka_pengaman->jenis_pengaman = $pengaman->jenis_pengaman;
				$buka_pengaman->jumlah_pengaman = $pengaman->jumlah_pengaman;
				$buka_pengaman->satuan_pengaman = $pengaman->satuan_pengaman;
				$buka_pengaman->tempat_pengaman = $pengaman->tempat_pengaman;
				$buka_pengaman->nomor_pengaman = $pengaman->nomor_pengaman;
				$buka_pengaman->tanggal_pengaman = $pengaman->chain->penindakan->tanggal_selesai_penindakan->format('Y-m-d');
			} else {
				// Create chain
				$chain = DocumentsChain::create();

				// Create penindakan
				$penindakan = new Penindakan();
				$penindakan->chain_id = $chain->id;
				$penindakan->save();

				// Set pengaman data
				$buka_pengaman->chain_id = $chain->id;
				$buka_pengaman->asal_pengaman = 'input';
				$buka_pengaman->jenis_pengaman = $faker->randomElement(['Kertas', 'Timah', 'Lainnya']);
				$buka_pengaman->jumlah_pengaman = $faker->numberBetween(1,5);
				$buka_pengaman->satuan_pengaman = $faker->randomElement(['lembar', 'buah']);
				$buka_pengaman->tempat_pengaman = $faker->word();
				$buka_pengaman->nomor_pengaman = 'BA-' . $faker->numberBetween(1,100) . '/Tanda Pengaman/BC/' . date("Y");
				$buka_pengaman->tanggal_pengaman = $faker->dateTimeThisYear()->format('Y-m-d');

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
			}
			$buka_pengaman->saveQuietly();

			// Update chain status
			$chain->update(['latest_document' => $buka_pengaman->kode_dokumen]);

			// Petugas
			$petugas1 = [
				'posisi' => 'petugas1', 
				'flag_pejabat' => false, 
				'nip' => '123456',
			];
			$buka_pengaman->detail_petugas()->create($petugas1);

			$with_petugas2 = $faker->boolean();
			if ($with_petugas2) {
				$petugas2 = [
					'posisi' => 'petugas2', 
					'flag_pejabat' => false, 
					'nip' => '665544',
				];
				$buka_pengaman->detail_petugas()->create($petugas2);
			}
		}

		Penomoran::create([
			'tipe_dokumen' => $buka_pengaman->tipe_dokumen,
			'agenda' => $buka_pengaman->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $no_current,
		]);
	}
}
