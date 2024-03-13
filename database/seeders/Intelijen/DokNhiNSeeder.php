<?php

namespace Database\Seeders\Intelijen;

use App\Models\Entitas\EntitasBadanHukum;
use App\Models\Entitas\EntitasOrang;
use App\Models\Intelijen\DokLkaiN;
use App\Models\Intelijen\DokNhiN;
use App\Models\Intelijen\DokNhiNExim;
use App\Models\Intelijen\DokNhiNOrang;
use App\Models\Intelijen\DokNhiNSarkut;
use App\Models\Penomoran;
use App\Models\References\RefBandara;
use App\Models\References\RefLokasi;
use App\Models\References\RefTembusan;
use App\Traits\BarangTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokNhiNSeeder extends Seeder
{
	use BarangTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		// Get LKAI ids
		$max_lkain_id = DokLkaiN::max('id');
		$available_lkain_id = range(1, $max_lkain_id);

		// Get locations reference
		$lokasi = RefLokasi::select('lokasi')->get();

		// Get airport codes
		$airports = RefBandara::select('iata_code')->where('iata_code', '!=', 'CGK')->get()->all();
		$airports_code = array_map(function($d) {return $d['iata_code'];}, $airports);

		// Current year
		$year = date("Y");

		for ($d=1; $d < 11; $d++) { 
			$max_nhin = DokNhiN::max('no_dok');
			$crn_nhin = $max_nhin + 1;

			// Get data LKAI-N
			$lkain_id = $faker->randomElement($available_lkain_id);
			$key = array_search($lkain_id, $available_lkain_id);
			unset($available_lkain_id[$key]);
			$lkain = DokLkaiN::find($lkain_id);
			$lkain->update(['kode_status' => 'tindak-lanjut']);
			$chain = $lkain->chain;

			// Create NHI-N header data
			$nhin = new DokNhiN();
			$nhin->no_dok = $crn_nhin;
			$nhin->agenda_dok = $nhin->agenda_dokumen;
			$nhin->thn_dok = date("Y");
			$nhin->no_dok_lengkap = "{$nhin->tipe_dokumen}-{$crn_nhin}{$nhin->agenda_dokumen}{$year}";
			$nhin->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$nhin->chain_id = $chain->id;
			$nhin->sifat = $faker->randomElement(['segera', 'sangat segera']);
			$nhin->klasifikasi = $faker->randomElement(['rahasia', 'sangat rahasia']);
			$nhin->tujuan = $faker->randomElement(['Kepala Seksi Patroli dan Operasi I', 'Kepala Seksi Patroli dan Operasi II']);
			$nhin->tempat_indikasi = $faker->randomElement($lokasi)->lokasi;
			$nhin->tanggal_indikasi = $faker->dateTimeThisYear()->format('Y-m-d');
			$nhin->waktu_indikasi = $faker->time();
			$nhin->zona_waktu = 'WIB';
			$nhin->kode_kantor = '050100';
			$nhin->indikasi = $faker->text();
			$nhin->kode_status = 'terbit';
			$nhin->saveQuietly();

			// Create kegiatan data
			$kegiatan = $faker->randomElement(['exim', 'sarkut', 'orang']);
			if ($kegiatan == 'exim') {
				$detail_nhin = DokNhiNExim::create([
					'tipe' => $faker->randomElement(['Impor', 'Ekspor', 'PJT', 'Penumpang']),
					'jenis_dok' => $faker->randomElement(['PIB', 'PEB']),
					'nomor_dok' => $faker->numberBetween(1, 999999),
					'tanggal_dok' => $faker->date(),
					'nama_sarkut' => $faker->company(),
					'nomor_sarkut' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'nomor_awb' => $faker->regexify('[A-Z]{3}[0-9]{10}'),
					'tanggal_awb' => $faker->date(),
					'merek_koli' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'data_lain' => $faker->text(),
				]);

				// Entitas
				$tipe_entitas = $faker->randomElement(['orang', 'badan-hukum']);
				if ($tipe_entitas=='orang') {
					$entitas = EntitasOrang::find($faker->numberBetween(1,100));
				} else {
					$entitas = EntitasBadanHukum::find($faker->numberBetween(1,100));
				}
				$detail_nhin->entitas()->associate($entitas)->save();

				// Create barang
				$this->seedBarang($nhin);

			} elseif ($kegiatan == 'sarkut') {
				$detail_nhin = DokNhiNSarkut::create([
					'nama_sarkut' => $faker->company(),
					'jenis_sarkut' => 'Pesawat',
					'nomor_sarkut' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'kode_pelabuhan_asal' => $faker->randomElement($airports_code),
					'kode_pelabuhan_tujuan' => 'CGK',
					'imo_mmsi' => $faker->regexify('[A-Z]{2}-[0-9]{3}'),
					'data_lain' => $faker->text(),
				]);
			} elseif ($kegiatan == 'orang') {
				$detail_nhin = DokNhiNOrang::create([
					'entitas_id' => $faker->numberBetween(1, 100),
					'nomor_sarkut' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
					'kode_pelabuhan_asal' => $faker->randomElement($airports_code),
					'kode_pelabuhan_tujuan' => 'CGK',
					'tanggal_berangkat' => $faker->date(),
					'waktu_berangkat' => $faker->time(),
					'tanggal_datang' => $faker->date(),
					'waktu_datang' => $faker->time(),
					'data_lain' => $faker->text()
				]);
			}

			$nhin->detail()->associate($detail_nhin)->save();

			/**
			 * Petugas
			 */
			// Pejabat
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['147', '258', '111', '2222']) : '555';
			$pejabat = ['posisi' => 'penerbit', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$nhin->detail_petugas()->create($pejabat);

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $nhin->kode_dokumen]);

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

		Penomoran::create([
			'tipe_dokumen' => $nhin->tipe_dokumen,
			'agenda' => $nhin->agenda_dokumen,
			'tahun' => date('Y'),
			'nomor_terakhir' => $crn_nhin,
		]);
    }
}
