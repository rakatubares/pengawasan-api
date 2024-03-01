<?php

namespace Database\Seeders\Intelijen;

use App\Models\DocumentsChain;
use App\Models\Intelijen\IkhtisarInformasi;
use App\Models\Penomoran;
use App\Models\References\RefKepercayaanSumber;
use App\Models\References\RefValiditasInformasi;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokLkaiSeeder extends Seeder
{
	public function __construct($kode_lppi='lppi', $kode_lkai='lkai')
	{
		$this->tipe_lkai = $kode_lkai;
		$this->tipe_npi = $kode_lkai == 'lkain' ? 'NPI-N' : 'NPI';
		$this->model_lkai = Relation::getMorphedModel($kode_lkai);
		$this->model_lppi = Relation::getMorphedModel($kode_lppi);	
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// Get LPPI ids
		$max_lppi_id = $this->model_lppi::max('id');
		$available_lppi_id = range(1, $max_lppi_id);

		// Current year
		$year = date("Y");

		// Default number for LPTI and NPI
		$crn_lpti = 1;
		$crn_npi = 1;

		// References
		$ref_kepercayaan = RefKepercayaanSumber::all()->all();
		$list_kode_kepercayaan = array_map(function ($k){ return $k->klasifikasi; }, $ref_kepercayaan);
		$ref_validitas = RefValiditasInformasi::all()->all();
		$list_kode_validitas = array_map(function ($v){ return $v->klasifikasi; }, $ref_validitas);

		for ($d=1; $d < 31; $d++) { 
			$max_lkai = $this->model_lkai::max('no_dok');
			$crn_lkai = $max_lkai + 1;

			// LPTI
			$flag_lpti = $faker->boolean();
			if ($flag_lpti) {
				$nomor_lpti = "LPTI-$crn_lpti/KPU.305/$year";
				$tanggal_lpti = $faker->dateTimeThisYear()->format('Y-m-d');
				$crn_lpti += 1;
			} else {
				$nomor_lpti = null;
				$tanggal_lpti = null;
			}

			// NPI
			$flag_npi = $faker->boolean();
			if ($flag_npi) {
				$nomor_npi = $this->tipe_npi . '-' . $crn_npi . '/KPU.305/' . $year;
				$tanggal_npi = $faker->dateTimeThisYear()->format('Y-m-d');
				$crn_npi += 1;
			} else {
				$nomor_npi = null;
				$tanggal_npi = null;
			}

			// LPPI
			$with_lppi = $faker->boolean();
			if ($with_lppi) {
				// Get data LPPI
				$lppi_id = $faker->randomElement($available_lppi_id);
				$key = array_search($lppi_id, $available_lppi_id);
				unset($available_lppi_id[$key]);
				$lppi = $this->model_lppi::find($lppi_id);
				$chain = $lppi->chain;
				$lppi->update(['kode_status' => 'tindak-lanjut']);
			} else {
				// Create document chain
				$chain = DocumentsChain::create();

				// Create ikhtisar informasi
				$ikhtisar = IkhtisarInformasi::create(['chain_id' => $chain->id]);
				$informasi_count = $faker->numberBetween(1, 5);
				for ($i=0; $i < $informasi_count; $i++) { 
					IkhtisarInformasi::find($ikhtisar->id)
						->informasi()
						->create([
							'informasi' => $faker->text(),
							'kode_kepercayaan' => $faker->randomElement($list_kode_kepercayaan),
							'kode_validitas' => $faker->randomElement($list_kode_validitas),
						]);
				}
			}

			// Rekomendasi / informasi
			$rekomendasi = $faker->boolean() ? $faker->text() : null;
			$informasi = $faker->boolean() ? $faker->text() : null;

			// Create LKAI
			$lkai = new $this->model_lkai;
			$lkai->no_dok = $crn_lkai;
			$lkai->agenda_dok = $lkai->agenda_dokumen;
			$lkai->thn_dok = $year;
			$lkai->no_dok_lengkap = "{$lkai->tipe_dokumen}-{$crn_lkai}{$lkai->agenda_dokumen}{$year}";
			$lkai->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$lkai->chain_id = $chain->id;
			$lkai->flag_lpti = $flag_lpti;
			$lkai->nomor_lpti = $nomor_lpti;
			$lkai->tanggal_lpti = $tanggal_lpti;
			$lkai->flag_npi = $flag_npi;
			$lkai->nomor_npi = $nomor_npi;
			$lkai->tanggal_npi = $tanggal_npi;
			$lkai->prosedur = $faker->text();
			$lkai->hasil = $faker->text();
			$lkai->kesimpulan = $faker->text();
			$lkai->flag_rekom_nhi = $faker->boolean();
			$lkai->flag_rekom_ni = $faker->boolean();
			$lkai->rekomendasi_lain = $rekomendasi;
			$lkai->informasi_lain = $informasi;
			$lkai->tujuan = $faker->text(30);
			$lkai->keputusan_pejabat = $faker->boolean();
			$lkai->catatan_pejabat = $faker->text();
			$lkai->tanggal_terima_pejabat = $faker->dateTimeThisYear()->format('Y-m-d');
			$lkai->keputusan_atasan = $faker->boolean();
			$lkai->catatan_atasan = $faker->text();
			$lkai->tanggal_terima_atasan = $faker->dateTimeThisYear()->format('Y-m-d');
			$lkai->kode_status = 'terbit';
			if ($this->tipe_lkai == 'lkain') {
				unset($lkai->informasi_lain);
			}
			$lkai->saveQuietly();

			/**
			 * Petugas
			 */

			// Analis
			$analis = [
				'posisi' => 'analis', 
				'flag_pejabat' => false, 
				'nip' => $faker->randomElement(['123456', '665544'])
			];
			$lkai->detail_petugas()->create($analis);
			
			// Pejabat
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '111', '2222']) : '147';
			$pejabat = ['posisi' => 'pejabat', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0501', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lkai->detail_petugas()->create($pejabat);

			// Atasan
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '111', '2222', '147']) : '555';
			$pejabat = ['posisi' => 'atasan', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lkai->detail_petugas()->create($pejabat);

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $lkai->kode_dokumen]);
		}

		Penomoran::create([
			'tipe_dokumen' => $lkai->tipe_dokumen,
			'agenda' => $lkai->agenda_dokumen,
			'tahun' => date('Y'),
			'nomor_terakhir' => $crn_lkai,
		]);
	}
}
