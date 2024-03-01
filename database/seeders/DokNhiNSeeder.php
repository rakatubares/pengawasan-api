<?php

namespace Database\Seeders;

use App\Models\DokLkaiN;
use App\Models\DokNhiN;
use App\Models\ObjectRelation;
use App\Models\RefBandara;
use App\Models\References\RefTembusan;
use App\Models\RefKantorBC;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokNhiNSeeder extends Seeder
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
		$tipe_surat = $this->switchObject('nhin', 'tipe_dok');
		$agenda = $this->switchObject('nhin', 'agenda');

		// Get LKAI ids
		$max_lkain_id = DokLkaiN::max('id');
		$available_lkain_id = range(1, $max_lkain_id);

		// Get office codes
		$offices = RefKantorBC::select('kd_kantor')->where('active', '!=', 0)->get()->all();
		$offices_code = array_map(function($d) {return $d['kd_kantor'];}, $offices);

		// Get airport codes
		$airports = RefBandara::select('iata_code')->where('iata_code', '!=', 'CGK')->get()->all();
		$airports_code = array_map(function($d) {return $d['iata_code'];}, $airports);

		for ($d=1; $d < 11; $d++) { 
			$max_nhin = DokNhiN::max('no_dok');
			$crn_nhin = $max_nhin + 1;

			// Randomize Office
			$is_soetta = $faker->boolean();
			$kd_kantor = $is_soetta ? '050100' : $faker->randomElement($offices_code);

			// Randomize Plh
			$plh_pejabat = $faker->boolean();
			if ($plh_pejabat) {
				$pejabat_id = $faker->randomElement([4, 5, 6, 7]);
			} else {
				$pejabat_id = 3;
			}

			// Create NHI-N header data
			$data_nhin = [
				'no_dok' => $crn_nhin,
				'agenda_dok' => $agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $crn_nhin . $agenda . date("Y"),
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
				'kd_kantor' => $kd_kantor,
				'indikasi' => $faker->text(),
				'kode_jabatan' => 'bd.05',
				'plh_pejabat' => $plh_pejabat,
				'pejabat_id' => $pejabat_id,
				'kode_status' => 200
			];

			// Create kegiatan data
			$kegiatan = $faker->randomElement(['exim', 'sarkut', 'orang']);
			if ($kegiatan == 'exim') {
				// Create barang
				$barang = $this->createBarang();

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
					'id_barang_exim' => $barang->id,
					'data_lain_exim' => $faker->text(),
				];

				$data_nhin = array_merge($data_nhin, $data_exim);
			} elseif ($kegiatan == 'sarkut') {
				$data_sarkut = [
					'flag_sarkut' => true,
					'nama_sarkut' => $this->faker->company(),
					'jenis_sarkut' => 'Pesawat',
					'no_flight_trayek_sarkut' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
					'pelabuhan_asal_sarkut' => $faker->randomElement($airports_code),
					'pelabuhan_tujuan_sarkut' => 'CGK',
					'imo_mmsi_sarkut' => null,
					'data_lain_sarkut' => $faker->text(),
				];

				$data_nhin = array_merge($data_nhin, $data_sarkut);
			} elseif ($kegiatan == 'orang') {
				$data_orang = [
					'flag_orang' => true,
					'entitas_id' => $this->faker->numberBetween(1, 100),
					'flight_voyage_orang' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
					'pelabuhan_asal_orang' => $faker->randomElement($airports_code),
					'pelabuhan_tujuan_orang' => 'CGK',
					'waktu_berangkat_orang' => $faker->dateTime(),
					'waktu_datang_orang' => $faker->dateTime(),
					'data_lain_orang' => $faker->text()
				];

				$data_nhin = array_merge($data_nhin, $data_orang);
			}
			
			// Write NHI to database
			$nhin = DokNhiN::create($data_nhin);

			// Get data LKAI-N
			$lkain_id = $faker->randomElement($available_lkain_id);
			$key = array_search($lkain_id, $available_lkain_id);
			unset($available_lkain_id[$key]);
			$lkain = DokLkaiN::find($lkain_id);
			$lkain->update(['kode_status' => 222]);

			// Create relation Intelijen - NHI
			ObjectRelation::create([
				'object1_type' => 'intelijen',
				'object1_id' => $lkain->intelijen->id,
				'object2_type' => 'nhin',
				'object2_id' => $nhin->id,
			]);

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
				$nhin->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			} 
		}
    }
}
