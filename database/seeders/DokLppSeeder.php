<?php

namespace Database\Seeders;

use App\Models\DokLp;
use App\Models\DokLpp;
use App\Models\ObjectRelation;
use App\Models\Penyidikan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLppSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'lpp';
		$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$list_jenis_penindakan = [
			'penghentian sarana pengangkut', 
			'pemeriksaan barang',
			'penyegelan', 
			'penegahan', 
			'pengangkapan',
		];
		$list_jenis_perkara = [
			'impor umum',
			'impor fasilitas',
			'impor BKC',
			'cukai HT',
			'cukai EA',
			'cukai MMEA',
			'ekspor',
			'pengangkutan barang tertentu',
			'barang penumpang',
		];
		$list_status_pelanggaran = [
			'tertangkap tangan', 
			'tidak tertangkap tangan',
		];

		// Get lp ids
		$max_lp_id = DokLp::max('id');
		$available_lp_id = range(1, $max_lp_id);

		for ($i=1; $i < 11; $i++) {
			// Get data LP
			$lp_id = $this->faker->randomElement($available_lp_id);
			$key = array_search($lp_id, $available_lp_id);
			unset($available_lp_id[$key]);
			$lp = DokLp::find($lp_id);

			// Prepare data
			$pasal = $this->faker->numberBetween(1, 100);
			$ayat = $this->faker->numberBetween(1, 10);
			$sbp = $lp->lphp->lptp->sbp;
			$penindakan = $sbp->penindakan;
			$locus = $penindakan->lokasi_penindakan;
			$tempus = $sbp->wkt_mulai_penindakan;
			try {
				$pelaku_id = $penindakan->sarkut->pilot_id;
			} catch (\Throwable $th) {
				try {
					$pelaku_id = $penindakan->barang->pemilik_id;
				} catch (\Throwable $th) {
					try {
						$pelaku_id = $penindakan->bangunan->pemilik_id;
					} catch (\Throwable $th) {
						$pelaku_id = $penindakan->object_id;
					}
				}
			}

			// Create penyidikan
			$penyidikan = Penyidikan::create([
				'jenis_pelanggaran' => $this->faker->sentence($nbWOrds = 20),
				'pasal' => 'pasal ' . $pasal . ' ayat (' . $ayat . ')',
				'tempat_pelanggaran' => $locus,
				'waktu_pelanggaran' => $tempus,
				'modus' => $this->faker->sentence($nbWOrds = 40),
				'pelaku_id' => $pelaku_id,
			]);

			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'penyidikan',
				'object2_id' => $penyidikan->id,
			]);

			// Create LPP
			$max_lpp = DokLpp::max('no_dok');
			$crn_lpp = $max_lpp + 1;
			$lpp = DokLpp::create([
				'no_dok' => $crn_lpp,
				'agenda_dok' => '/KPU.305/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $crn_lpp . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'asal_perkara' => $this->faker->sentence($nbWOrds = 5),
				'jenis_penindakan' => $this->faker->randomElement($list_jenis_penindakan),
				'jenis_perkara' => $this->faker->randomElement($list_jenis_perkara),
				'status_pelanggaran' => $this->faker->randomElement($list_status_pelanggaran),
				'catatan' => $this->faker->sentence($nbWOrds = 40),
				'petugas_id' => 1,
				'kode_jabatan1' => 'bd.0505',
				'plh1' => false,
				'pejabat1_id' => 6,
				'kode_jabatan2' => 'bd.05',
				'plh2' => false,
				'pejabat2_id' => 3,
				'kode_status' => 200
			]);

			ObjectRelation::create([
				'object1_type' => 'penyidikan',
				'object1_id' => $penyidikan->id,
				'object2_type' => 'lpp',
				'object2_id' => $lpp->id,
			]);

			// Change SBP status
			$lp->update(['kode_status' => 231]);
		}
	}
}
