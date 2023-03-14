<?php

namespace Database\Seeders;

use App\Models\DokLp;
use App\Models\DokLpN;
use App\Models\DokLpp;
use App\Models\ObjectRelation;
use App\Models\Penyidikan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLppSeeder extends Seeder
{
	use DetailSeederTrait;
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
		$available_lp = [];
		$max_lp_id = DokLp::max('id');
		$available_lp['lp'] = range(1, $max_lp_id);

		// Get lpn ids
		$max_lpn_id = DokLpN::max('id');
		$available_lp['lpn'] = range(1, $max_lpn_id);

		for ($i=1; $i < 26; $i++) {
			// Get data LP
			$lp_type = $this->faker->randomElement(['lp', 'lpn']);
			$lp_id = $this->faker->randomElement($available_lp[$lp_type]);
			$key = array_search($lp_id, $available_lp[$lp_type]);
			unset($available_lp[$lp_type][$key]);
			$lp = $lp_type == 'lp' ? DokLp::find($lp_id) : DokLpN::find($lp_id);

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
				'status_penangkapan' => $this->faker->randomElement($list_status_pelanggaran),
			]);

			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'penyidikan',
				'object2_id' => $penyidikan->id,
			]);

			// Create BHP
			$object_type_penindakan = $penindakan->object_type;
			if ($object_type_penindakan == 'barang') {
				$remove = ['id', 'created_at', 'updated_at', 'deleted_at'];
				
				// Create BHP
				$barang_penindakan = $penindakan->objectable->toArray();
				$barang_penyidikan = array_diff_key($barang_penindakan, array_flip($remove));
				$barang_penyidikan = $penyidikan->bhp()->create($barang_penyidikan);
				$penyidikan->update(['bhp_id' => $barang_penyidikan->id]);

				// Create dokumen
				$dokumen_penindakan = $penindakan->objectable->dokumen->toArray();
				$dokumen_penyidikan = array_diff_key($dokumen_penindakan, array_flip($remove));
				$barang_penyidikan->dokumen()->create($dokumen_penyidikan);

				// Create BHP items
				$item_penindakan = $penindakan->objectable->itemBarang->toArray();
				$item_penyidikan = [];
				foreach ($item_penindakan as $item) {
					$item = array_diff_key($item, array_flip($remove));
					$item_penyidikan[] = $item;
				}
				$penyidikan->bhp->itemBarang()->createMany($item_penyidikan);
			} else {
				$object = $this->createBarang(true);
				$penyidikan->update(['bhp_id' => $object->id]);
			}

			// Create sarkut
			$with_sarkut = $this->faker->boolean();
			if ($with_sarkut) {
				$sarkut = $this->createSarkut();
				$penyidikan->update(['sarkut_id' => $sarkut->id]);
			}

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

			// Change LP status
			$lp->update(['kode_status' => 231]);
		}
	}
}
