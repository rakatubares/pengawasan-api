<?php

namespace Database\Seeders;

use App\Models\DokLppi;
use App\Models\Intelijen;
use App\Models\ObjectRelation;
use App\Models\RefKepercayaanSumber;
use App\Models\RefValiditasInformasi;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLppiSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->tipe_dok = 'lppi';
		$this->prepareModel();
	}

	public function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
		$this->model = $this->switchObject($this->tipe_dok, 'model');
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

			$lppi = $this->model::create([
				'no_dok' => $crn_lppi,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $crn_lppi . $this->agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'flag_info_internal' => $info_internal,
				'media_info_internal' => $media_info_internal,
				'tgl_terima_info_internal' => $tgl_terima_info_internal,
				'no_dok_info_internal' => $no_dok_info_internal,
				'tgl_dok_info_internal' => $tgl_dok_info_internal,
				'flag_info_eksternal' => $info_eksternal,
				'media_info_eksternal' => $media_info_eksternal,
				'tgl_terima_info_eksternal' => $tgl_terima_info_eksternal,
				'no_dok_info_eksternal' => $no_dok_info_eksternal,
				'tgl_dok_info_eksternal' => $tgl_dok_info_eksternal,
				'kesimpulan' => $faker->text(),
				'tanggal_disposisi' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'flag_analisis' => $faker->boolean(),
				'flag_arsip' => $faker->boolean(),
				'catatan' => $faker->text(),
				'kode_status' => 200
			]);

			$intelijen = Intelijen::create();

			ObjectRelation::create([
				'object1_type' => 'intelijen',
				'object1_id' => $intelijen->id,
				'object2_type' => $this->tipe_dok,
				'object2_id' => $lppi->id,
			]);

			$ikhtisar_count = $faker->numberBetween(1, 5);
			for ($i=0; $i < $ikhtisar_count; $i++) { 
				Intelijen::find($intelijen->id)
					->ikhtisar()
					->create([
						'ikhtisar' => $faker->text(),
						'kode_kepercayaan' => $faker->randomElement($list_kode_kepercayaan),
						'kode_validitas' => $faker->randomElement($list_kode_validitas),
					]);
			}

			/**
			 * Petugas
			 */
			$petugas = [
				['posisi' => 'penerima_informasi', 'flag_pejabat' => false, 'nip' => $faker->randomElement(['123456', '665544'])],
				['posisi' => 'peneliti_informasi', 'flag_pejabat' => false, 'nip' => $faker->randomElement(['123456', '665544'])],
				['posisi' => 'penerima_disposisi', 'flag_pejabat' => false, 'nip' => $faker->randomElement(['123456', '665544'])],
			];
			foreach ($petugas as $p) {
				DokLppi::find($lppi->id)->detail_petugas()->create($p);
			}
			
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '111', '2222']) : '147';
			$pejabat = ['posisi' => 'pejabat', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0501', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			DokLppi::find($lppi->id)->detail_petugas()->create($pejabat);
		}
	}
}
