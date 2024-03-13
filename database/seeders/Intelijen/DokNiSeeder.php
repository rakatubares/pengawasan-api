<?php

namespace Database\Seeders\Intelijen;

use App\Models\Penomoran;
use App\Models\References\RefTembusan;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokNiSeeder extends Seeder
{
	public function __construct($kode_dokumen='ni') {
		$this->kode_dokumen = $kode_dokumen;
		$this->model_ni = Relation::getMorphedModel($this->kode_dokumen);
		$ni = new $this->model_ni;
		$this->kode_lkai = $ni->kode_lkai;
		$this->model_lkai = Relation::getMorphedModel($this->kode_lkai);
	}
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->faker = Faker::create();

		// Get LKAI ids
		$list_id_lkai = $this->model_lkai::select('id')->where('kode_status', 'terbit')
			->get()
			->toArray();
		$available_lkai_id = array_map(
			function($d) {return $d['id'];}, 
			$list_id_lkai
		);

		// Current year
		$year = date("Y");

		for ($d=1; $d < 11; $d++) { 
			$max_ni = $this->model_ni::max('no_dok');
			$crn_ni = $max_ni + 1;

			// LKAI
			$lkai_id = $this->faker->randomElement($available_lkai_id);
			$key = array_search($lkai_id, $available_lkai_id);
			unset($available_lkai_id[$key]);
			$lkai = $this->model_lkai::find($lkai_id);
			$lkai->update(['kode_status' => 'tindak-lanjut']);
			$chain = $lkai->chain;

			// Create NI data
			$ni = new $this->model_ni;
			$ni->no_dok = $crn_ni;
			$ni->agenda_dok = $ni->agenda_dokumen;
			$ni->thn_dok = $year;
			$ni->no_dok_lengkap = "{$ni->tipe_dokumen}-{$crn_ni}{$ni->agenda_dokumen}{$year}";
			$ni->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$ni->chain_id = $chain->id;
			$ni->sifat = $this->faker->randomElement(['segera', 'sangat segera']);
			$ni->klasifikasi = $this->faker->randomElement(['rahasia', 'sangat rahasia']);
			$ni->tujuan = $this->faker->randomElement(['Kepala Seksi Patroli dan Operasi I', 'Kepala Seksi Patroli dan Operasi II']);
			$ni->uraian = $this->createUraian();
			$ni->kode_status = 'terbit';
			$ni->saveQuietly();

			/**
			 * Petugas
			 */
			// Pejabat
			$tipe_ttd = $this->faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $this->faker->randomElement(['147', '258', '111', '2222']) : '555';
			$pejabat = ['posisi' => 'penerbit', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$ni->detail_petugas()->create($pejabat);

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $ni->kode_dokumen]);

			// Create tembusan
			$cc_sample = ['Direktur P2', 'Kasubdit Intelijen', 'Kepala Kantor', 'PDTA', 'Kabid PFPC'];
			$cc_count = rand(0,3);

			for ($x = 1; $x <= $cc_count; $x++) {
				// Choose CC
				$cc = $this->faker->randomElement($cc_sample);
				$key = array_search($cc, $cc_sample);
				unset($cc_sample[$key]);

				// Check if CC exists in reference
				$cc_data = RefTembusan::where('uraian', $cc)->first();
				if ($cc_data == null) {
					$cc_data = RefTembusan::create(['uraian' => $cc]);
				}

				// Write tembusan
				$ni->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			} 
		}

		Penomoran::create([
			'tipe_dokumen' => $ni->tipe_dokumen,
			'agenda' => $ni->agenda_dokumen,
			'tahun' => date('Y'),
			'nomor_terakhir' => $crn_ni,
		]);
	}

	// Create random uraian length
	private function createUraian()
	{
		$par_count = rand(1, 3);
		$paragraphs = [];
		for ($c=0; $c < $par_count; $c++) { 
			$par_length = $this->faker->randomElement([100, 200, 300, 400, 500]);
			$par = $this->faker->text($maxNbChars = $par_length);
			$paragraphs[] = $par;
		}
		$uraian = implode(PHP_EOL.PHP_EOL , $paragraphs);;

		return $uraian;
	}
}
