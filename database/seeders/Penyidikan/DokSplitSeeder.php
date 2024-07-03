<?php

namespace Database\Seeders\Penyidikan;

use App\Models\Penomoran;
use App\Models\Penyidikan\DokLpf;
use App\Models\Penyidikan\DokSplit;
use App\Models\References\RefTembusan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokSplitSeeder extends Seeder
{
	protected $kode_dokumen = 'split';

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

		// Get LPF ids
		$max_lpf_id = DokLpf::max('id');
		$available_lpf_id = range(1, $max_lpf_id);

		for ($i=1; $i < 16; $i++) { 
			// Get data LPF
			$lpf_id = $faker->randomElement($available_lpf_id);
			$key = array_search($lpf_id, $available_lpf_id);
			unset($available_lpf_id[$key]);
			$lpf = DokLpf::find($lpf_id);
			$lpf->followedUp();

			// Get chain
			$chain = $lpf->chain;

			// Create SPLIT
			$creator = $faker->randomElement(['123456', '665544']);

			$max_split = DokSplit::max('no_dok');
			$crn_split = $max_split + 1;

			$split = new DokSplit();
			$split->no_dok = $crn_split;
			$split->agenda_dok = $split->agenda_dokumen;
			$split->thn_dok = $year;
			$split->no_dok_lengkap = "{$split->tipe_dokumen}-{$crn_split}{$split->agenda_dokumen}{$year}";
			$split->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$split->chain_id = $chain->id;
			$split->dugaan_pelanggaran = $faker->text(rand(100,300));
			$split->kode_status = 'terbit';
			$split->created_by = $creator;
			$split->updated_by = $creator;
			$split->saveQuietly();

			/**
			 * Petugas
			 */

			// Petugas
			$nip_sample = ['123456', '665544'];
			$officer_count = rand(1,2);

			for ($x = 1; $x <= $officer_count; $x++) {
				// Choose CC
				$nip = $faker->randomElement($nip_sample);
				$key = array_search($nip, $nip_sample);
				unset($nip_sample[$key]);

				$petugas = [
					'posisi' => 'petugas', 
					'flag_pejabat' => false, 
					'nip' => $nip,
				];
				$split->detail_petugas()->create($petugas);
			} 

			// Pemberi Perintah
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '156748';
			$pejabat = [
				'posisi' => 'pejabat', 
				'flag_pejabat' => true, 
				'kode_jabatan' => 'bd.0505', 
				'tipe_ttd' => $tipe_ttd, 
				'nip' => $nip_pejabat
			];
			$split->detail_petugas()->create($pejabat);

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
				$split->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			}

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $split->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $split->tipe_dokumen,
			'agenda' => $split->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_split,
		]);
	}
}
