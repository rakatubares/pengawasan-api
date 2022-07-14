<?php

namespace Database\Seeders;

use App\Models\Intelijen;
use App\Models\ObjectRelation;
use App\Models\RefKepercayaanSumber;
use App\Models\RefValiditasInformasi;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLkaiSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->tipe_lkai = 'lkai';
		$this->tipe_lppi = 'lppi';
		$this->prepareModel();
	}

	public function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->tipe_lkai, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_lkai, 'agenda');
		$this->model_lkai = $this->switchObject($this->tipe_lkai, 'model');
		$this->model_lppi = $this->switchObject($this->tipe_lppi, 'model');
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		$tipe_surat = $this->switchObject($this->tipe_lkai, 'tipe_dok');
		$agenda = $this->switchObject($this->tipe_lkai, 'agenda');

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
				$tipe_npi = $this->tipe_lkai == 'lkain' ? 'NPI-N' : 'NPI';
				$nomor_npi = "$tipe_npi-$crn_npi/KPU.305/$year";
				$tanggal_npi = $faker->dateTimeThisYear()->format('Y-m-d');
				$crn_npi += 1;
			} else {
				$nomor_npi = null;
				$tanggal_npi = null;
			}

			// Rekomendasi / informasi
			$rekomendasi = $faker->boolean() ? $faker->text() : null;
			$informasi = $faker->boolean() ? $faker->text() : null;

			// Pejabat
			$kode_pejabat = $faker->randomElement(['bd.0501', 'bd.0502']);
			$plh_pejabat = $faker->boolean();
			if ($plh_pejabat) {
				$pejabat_id = $faker->randomElement([4, 5, 6, 7]);
			} else {
				$pejabat_id = $faker->randomElement([6, 7]);
			}
			
			// Atasan
			$plh_atasan = $faker->boolean();
			if ($plh_atasan) {
				$atasan_id = $faker->randomElement([4, 5, 6, 7]);
			} else {
				$atasan_id = 3;
			}

			// Create LKAI
			$data_lkai = [
				'no_dok' => $crn_lkai,
				'agenda_dok' => $agenda,
				'thn_dok' => $year,
				'no_dok_lengkap' => "{$tipe_surat}-{$crn_lkai}{$agenda}{$year}",
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'flag_lpti' => $flag_lpti,
				'nomor_lpti' => $nomor_lpti,
				'tanggal_lpti' => $tanggal_lpti,
				'flag_npi' => $flag_npi,
				'nomor_npi' => $nomor_npi,
				'tanggal_npi' => $tanggal_npi,
				'prosedur' => $faker->text(),
				'hasil' => $faker->text(),
				'kesimpulan' => $faker->text(),
				'flag_rekom_nhi' => $faker->boolean(),
				'flag_rekom_ni' => $faker->boolean(),
				'rekomendasi_lain' => $rekomendasi,
				'informasi_lain' => $informasi,
				'tujuan' => $faker->text(30),
				'analis_id' => 1,
				'keputusan_pejabat' => $faker->boolean(),
				'catatan_pejabat' => $faker->text(),
				'tanggal_terima_pejabat' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'kode_pejabat' => $kode_pejabat,
				'plh_pejabat' => $plh_pejabat,
				'pejabat_id' => $pejabat_id,
				'keputusan_atasan' => $faker->boolean(),
				'catatan_atasan' => $faker->text(),
				'tanggal_terima_atasan' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'kode_atasan' => 'bd.05',
				'plh_atasan' => $plh_atasan,
				'atasan_id' => $atasan_id,
				'kode_status' => 200,
			];
			if ($this->tipe_lkai == 'lkain') {
				unset($data_lkai['informasi_lain']);
			}
			$lkai = $this->model_lkai::create($data_lkai);

			// LPPI
			$with_lppi = $faker->boolean();
			if ($with_lppi) {
				// Get data LPPI
				$lppi_id = $faker->randomElement($available_lppi_id);
				$key = array_search($lppi_id, $available_lppi_id);
				unset($available_lppi_id[$key]);
				$lppi = $this->model_lppi::find($lppi_id);
				$status_lppi = $this->tipe_lppi == 'lppin' ? 221 : 211;
				$lppi->update(['kode_status' => $status_lppi]);

				// Create relation Intelijen - LKAI
				ObjectRelation::create([
					'object1_type' => 'intelijen',
					'object1_id' => $lppi->intelijen->id,
					'object2_type' => $this->tipe_lkai,
					'object2_id' => $lkai->id,
				]);
			} else {
				// Create intelijen
				$intelijen = Intelijen::create();

				// Create relation Intelijen - LKAI
				ObjectRelation::create([
					'object1_type' => 'intelijen',
					'object1_id' => $intelijen->id,
					'object2_type' => $this->tipe_lkai,
					'object2_id' => $lkai->id,
				]);

				// Create ikhtisar
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
			}
		}
	}
}
