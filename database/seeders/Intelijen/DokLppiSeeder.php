<?php

namespace Database\Seeders\Intelijen;

use App\Models\DocumentsChain;
use App\Models\Penomoran;
use App\Models\References\RefKepercayaanSumber;
use App\Models\References\RefValiditasInformasi;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokLppiSeeder extends Seeder
{
	public function __construct($kode_dokumen='lppi')
	{
		$this->model = Relation::getMorphedModel($kode_dokumen);
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		$ref_kepercayaan = RefKepercayaanSumber::all()->all();
		$list_kode_kepercayaan = array_map(function ($k){ return $k->klasifikasi; }, $ref_kepercayaan);
		$ref_validitas = RefValiditasInformasi::all()->all();
		$list_kode_validitas = array_map(function ($v){ return $v->klasifikasi; }, $ref_validitas);

		for ($d=1; $d < 41; $d++) { 
			$max_lppi = $this->model::max('no_dok');
			$crn_lppi = $max_lppi + 1;

			$info_internal = $faker->boolean();
			if ($info_internal) {
				$media_info_internal = $faker->randomElement(['kajian', 'sms center', 'Nota Informasi', 'LPTI', 'surat', 'nota dinas']);
				$tgl_terima_info_internal = $faker->dateTimeThisYear()->format('Y-m-d');
				$no_dok_info_internal = $faker->regexify('[A-Za-z0-9]{10}');
				$tgl_dok_info_internal = $faker->dateTimeThisYear()->format('Y-m-d');
			} else {
				$media_info_internal = null;
				$tgl_terima_info_internal = null;
				$no_dok_info_internal = null;
				$tgl_dok_info_internal = null;
			}

			$info_eksternal = $info_internal == false ? true : $faker->boolean();
			if ($info_eksternal) {
				$media_info_eksternal = $faker->randomElement(['kajian', 'sms center', 'Nota Informasi', 'LPTI', 'surat', 'nota dinas']);
				$tgl_terima_info_eksternal = $faker->dateTimeThisYear()->format('Y-m-d');
				$no_dok_info_eksternal = $faker->regexify('[A-Za-z0-9]{10}');
				$tgl_dok_info_eksternal = $faker->dateTimeThisYear()->format('Y-m-d');
			} else {
				$media_info_eksternal = null;
				$tgl_terima_info_eksternal = null;
				$no_dok_info_eksternal = null;
				$tgl_dok_info_eksternal = null;
			}

			// Create document chain
			$chain = DocumentsChain::create();

			// Insert data
			$lppi = new $this->model;
			$lppi->no_dok = $crn_lppi;
			$lppi->agenda_dok = $lppi->agenda_dokumen;
			$lppi->thn_dok = date("Y");
			$lppi->no_dok_lengkap = $lppi->tipe_dokumen . '-' . $crn_lppi . $lppi->agenda_dokumen . date("Y");
			$lppi->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$lppi->chain_id = $chain->id;
			$lppi->flag_info_internal = $info_internal;
			$lppi->media_info_internal = $media_info_internal;
			$lppi->tgl_terima_info_internal = $tgl_terima_info_internal;
			$lppi->no_dok_info_internal = $no_dok_info_internal;
			$lppi->tgl_dok_info_internal = $tgl_dok_info_internal;
			$lppi->flag_info_eksternal = $info_eksternal;
			$lppi->media_info_eksternal = $media_info_eksternal;
			$lppi->tgl_terima_info_eksternal = $tgl_terima_info_eksternal;
			$lppi->no_dok_info_eksternal = $no_dok_info_eksternal;
			$lppi->tgl_dok_info_eksternal = $tgl_dok_info_eksternal;
			$lppi->kesimpulan = $faker->text();
			$lppi->tanggal_disposisi = $faker->dateTimeThisYear()->format('Y-m-d');
			$lppi->flag_analisis = $faker->boolean();
			$lppi->flag_arsip = $faker->boolean();
			$lppi->catatan = $faker->text();
			$lppi->kode_status = 'terbit';
			$lppi->saveQuietly();

			// Create ikhtisar informasi
			$informasi_count = $faker->numberBetween(1, 5);
			for ($i=0; $i < $informasi_count; $i++) { 
				$lppi->informasi()
					->create([
						'informasi' => $faker->text(),
						'kode_kepercayaan' => $faker->randomElement($list_kode_kepercayaan),
						'kode_validitas' => $faker->randomElement($list_kode_validitas),
					]);
			}

			/**
			 * Petugas
			 */
			$petugas = [
				['posisi' => 'penerima_informasi', 'flag_pejabat' => false, 'nip' => $faker->randomElement(['123456', '665544'])],
				['posisi' => 'penilai_informasi', 'flag_pejabat' => false, 'nip' => $faker->randomElement(['123456', '665544'])],
				['posisi' => 'penerima_disposisi', 'flag_pejabat' => false, 'nip' => $faker->randomElement(['123456', '665544'])],
			];
			foreach ($petugas as $p) {
				$lppi->detail_petugas()->create($p);
			}
			
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '111', '2222']) : '147';
			$pejabat = [
				'posisi' => 'pejabat', 
				'flag_pejabat' => true, 
				'kode_jabatan' => 'bd.0501', 
				'tipe_ttd' => $tipe_ttd, 
				'nip' => $nip_pejabat
			];
			$lppi->detail_petugas()->create($pejabat);

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lppi->kode_dokumen]);
		}

		Penomoran::create([
			'tipe_dokumen' => $lppi->tipe_dokumen,
			'agenda' => $lppi->agenda_dokumen,
			'tahun' => date('Y'),
			'nomor_terakhir' => $crn_lppi,
		]);
	}
}
