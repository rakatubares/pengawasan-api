<?php

namespace Database\Seeders;

use App\Models\DokLkai;
use App\Models\DokNhi;
use App\Models\ObjectRelation;
use App\Models\RefTembusan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokNhiSeeder extends Seeder
{
	use DetailSeederTrait;
	use SwitcherTrait;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		$tipe_surat = $this->switchObject('nhi', 'tipe_dok');
		$agenda = $this->switchObject('nhi', 'agenda');

		// Get LKAI ids
		$max_lkai_id = DokLkai::max('id');
		$available_lkai_id = range(1, $max_lkai_id);

		for ($d=1; $d < 11; $d++) { 
			$max_nhi = DokNhi::max('no_dok');
			$crn_nhi = $max_nhi + 1;

			// Randomize Plh
			$plh_pejabat = $faker->boolean();
			if ($plh_pejabat) {
				$pejabat_id = $faker->randomElement([4, 5, 6, 7]);
			} else {
				$pejabat_id = 3;
			}

			// Create NHI header data
			$data_nhi = [
				'no_dok' => $crn_nhi,
				'agenda_dok' => $agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $crn_nhi . $agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'sifat' => $faker->randomElement(['segera', 'sangat segera']),
				'klasifikasi' => $faker->randomElement(['rahasia', 'sangat rahasia']),
				'tujuan' => $faker->randomElement([
					'Kepala Seksi Patroli dan Operasi I',
					'Kepala Seksi Patroli dan Operasi II',
				]),
				'tempat_indikasi' => $faker->address(),
				'waktu_indikasi' => $faker->dateTime(),
				'zona_waktu' => 'WIB',
				'kantor' => 'KPU Bea dan Cukai Tipe C Soekarno Hatta',
				'indikasi' => $faker->text(),
				'kode_jabatan' => 'bd.05',
				'plh_pejabat' => $plh_pejabat,
				'pejabat_id' => $pejabat_id,
				'kode_status' => 200
			];

			// Create kegiatan data
			$kegiatan = $faker->randomElement(['exim', 'bkc', 'tertentu']);
			if ($kegiatan == 'exim') {
				$data_exim = [
					'flag_exim' => true,
					'jenis_dok_exim' => $faker->randomElement(['PIB', 'PEB']),
					'nomor_dok_exim' => $faker->numberBetween(1, 999999),
					'tanggal_dok_exim' => $faker->date(),
					'nama_sarkut_exim' => $faker->company(),
					'no_flight_trayek_exim' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'nomor_awb_exim' => $faker->regexify('[A-Z]{3}[0-9]{10}'),
					'tanggal_awb_exim' => $faker->date(),
					'merek_koli_exim' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'importir_ppjk' => $faker->company(),
					'npwp' => $faker->regexify('[0-9]{15}'),
					'data_lain_exim' => $faker->text(),
				];

				$data_nhi = array_merge($data_nhi, $data_exim);
			} elseif ($kegiatan == 'bkc') {
				$data_bkc = [
					'flag_bkc' => true,
					'tempat_penimbunan' => $faker->address(),
					'penyalur' => $faker->company(),
					'tempat_penjualan' => $faker->address(),
					'nppbkc' => $faker->regexify('[0-9]{15}'),
					'nama_sarkut_bkc' => $faker->company(),
					'no_flight_trayek_bkc' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'data_lain_bkc' => $faker->text(),
				];

				$data_nhi = array_merge($data_nhi, $data_bkc);
			} elseif ($kegiatan == 'tertentu') {
				$data_tertentu = [
					'flag_tertentu' => true,
					'jenis_dok_tertentu' => $faker->randomElement(['PIB', 'PEB']),
					'nomor_dok_tertentu' => $faker->numberBetween(1, 999999),
					'tanggal_dok_tertentu' => $faker->date(),
					'nama_sarkut_tertentu' => $faker->company(),
					'no_flight_trayek_tertentu' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'nomor_awb_tertentu' => $faker->regexify('[A-Z]{3}[0-9]{10}'),
					'tanggal_awb_tertentu' => $faker->date(),
					'merek_koli_tertentu' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'orang_badan_hukum' => $faker->company(),
					'data_lain_tertentu' => $faker->text(),
				];

				$data_nhi = array_merge($data_nhi, $data_tertentu);
			}

			// Write NHI to database
			$nhi = DokNhi::create($data_nhi);

			// Get data LKAI
			$lkai_id = $faker->randomElement($available_lkai_id);
			$key = array_search($lkai_id, $available_lkai_id);
			unset($available_lkai_id[$key]);
			$lkai = DokLkai::find($lkai_id);
			$lkai->update(['kode_status' => 212]);

			// Create relation Intelijen - NHI
			ObjectRelation::create([
				'object1_type' => 'intelijen',
				'object1_id' => $lkai->intelijen->id,
				'object2_type' => 'nhi',
				'object2_id' => $nhi->id,
			]);

			// Create barang
			$barang = $this->createBarang();
			$nhi->update(['barang_id' => $barang->id]);

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
