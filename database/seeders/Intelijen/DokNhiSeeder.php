<?php

namespace Database\Seeders\Intelijen;

use App\Models\Entitas\EntitasBadanHukum;
use App\Models\Entitas\EntitasOrang;
use App\Models\Intelijen\DokLkai;
use App\Models\Intelijen\DokNhi;
use App\Models\Intelijen\DokNhiBkc;
use App\Models\Intelijen\DokNhiExim;
use App\Models\Intelijen\DokNhiTertentu;
use App\Models\References\RefLokasi;
use App\Models\References\RefTembusan;
use App\Traits\BarangTrait;
use Database\Seeders\DetailSeederTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokNhiSeeder extends Seeder
{
	use BarangTrait;
	use DetailSeederTrait;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		
		// Get LKAI ids
		$max_lkai_id = DokLkai::max('id');
		$available_lkai_id = range(1, $max_lkai_id);

		// Get locations reference
		$lokasi = RefLokasi::select('lokasi')->get();

		// Current year
		$year = date("Y");

		for ($d=1; $d < 11; $d++) { 
			$max_nhi = DokNhi::max('no_dok');
			$crn_nhi = $max_nhi + 1;

			// LKAI
			$lkai_id = $faker->randomElement($available_lkai_id);
			$key = array_search($lkai_id, $available_lkai_id);
			unset($available_lkai_id[$key]);
			$lkai = DokLkai::find($lkai_id);
			$lkai->update(['kode_status' => 'tindak-lanjut']);
			$chain = $lkai->chain;

			// Create NHI header data
			$nhi = new DokNhi();
			$nhi->no_dok = $crn_nhi;
			$nhi->agenda_dok = $nhi->agenda_dokumen;
			$nhi->thn_dok = date("Y");
			$nhi->no_dok_lengkap = "{$nhi->tipe_dokumen}-{$crn_nhi}{$nhi->agenda_dokumen}{$year}";
			$nhi->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$nhi->chain_id = $chain->id;
			$nhi->sifat = $faker->randomElement(['segera', 'sangat segera']);
			$nhi->klasifikasi = $faker->randomElement(['rahasia', 'sangat rahasia']);
			$nhi->tujuan = $faker->randomElement(['Kepala Seksi Patroli dan Operasi I', 'Kepala Seksi Patroli dan Operasi II']);
			$nhi->tempat_indikasi = $faker->randomElement($lokasi)->lokasi;
			$nhi->waktu_indikasi = $faker->dateTime();
			$nhi->zona_waktu = 'WIB';
			$nhi->kode_kantor = '050100';
			$nhi->indikasi = $faker->text();
			$nhi->kode_status = 'terbit';
			$nhi->saveQuietly();

			// Create kegiatan data
			$kegiatan = $faker->randomElement(['exim', 'bkc', 'tertentu']);
			if ($kegiatan == 'exim') {
				$detail_nhi = DokNhiExim::create([
					'tipe' => $faker->randomElement(['Impor', 'Ekspor', 'PJT', 'Penumpang']),
					'jenis_dok' => $faker->randomElement(['PIB', 'PEB', 'AWB']),
					'nomor_dok' => $faker->numberBetween(1, 999999),
					'tanggal_dok' => $faker->date(),
					'nama_sarkut' => $faker->company(),
					'no_flight_trayek' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'nomor_awb' => $faker->regexify('[A-Z]{3}[0-9]{10}'),
					'tanggal_awb' => $faker->date(),
					'merek_koli' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'data_lain' => $faker->text(),
				]);

				$tipe_entitas = $faker->randomElement(['orang', 'badan-hukum']);
				if ($tipe_entitas=='orang') {
					$entitas = EntitasOrang::find($faker->numberBetween(1,100));
				} else {
					$entitas = EntitasBadanHukum::find($faker->numberBetween(1,100));
				}
				$detail_nhi->entitas()->associate($entitas)->save();
			} else if ($kegiatan == 'bkc') {
				$detail_nhi = DokNhiBkc::create([
					'tempat_penimbunan' => $faker->address(),
					'penyalur' => $faker->company(),
					'tempat_penjualan' => $faker->address(),
					'nppbkc' => $faker->regexify('[0-9]{15}'),
					'nama_sarkut' => $faker->company(),
					'no_flight_trayek' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'data_lain' => $faker->text(),
				]);
			} else if ($kegiatan == 'tertentu') {
				$detail_nhi = DokNhiTertentu::create([
					'jenis_dok' => $faker->randomElement(['PIB', 'PEB']),
					'nomor_dok' => $faker->numberBetween(1, 999999),
					'tanggal_dok' => $faker->date(),
					'nama_sarkut' => $faker->company(),
					'no_flight_trayek' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'nomor_awb' => $faker->regexify('[A-Z]{3}[0-9]{10}'),
					'tanggal_awb' => $faker->date(),
					'merek_koli' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'data_lain' => $faker->text(),
				]);

				$tipe_entitas = $faker->randomElement(['orang', 'badan-hukum']);
				if ($tipe_entitas=='orang') {
					$entitas = EntitasOrang::find($faker->numberBetween(1,100));
				} else {
					$entitas = EntitasBadanHukum::find($faker->numberBetween(1,100));
				}
				$detail_nhi->entitas()->associate($entitas)->save();
			}

			$nhi->detail()->associate($detail_nhi)->save();
			

			/**
			 * Petugas
			 */
			// Pejabat
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['147', '258', '111', '2222']) : '555';
			$pejabat = ['posisi' => 'penerbit', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$nhi->detail_petugas()->create($pejabat);

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $nhi->kode_dokumen]);

			// Create barang
			$this->seedBarang($nhi);

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
				$nhi->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			} 
		}
	}
}
