<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokRiksa;
use App\Models\DokSegel;
use App\Models\DokTegah;
use App\Models\DokTolakSbp1;
use App\Models\DokTolakSbp2;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokSbpSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->tipe_dok = 'sbp';
		$this->tipe_lptp = 'lptp';
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->faker = Faker::create();
		$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
		$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
		$this->model = $this->switchObject($this->tipe_dok, 'model');
		$this->model_lptp = $this->switchObject($this->tipe_lptp, 'model');
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 21; $i++) { 
			$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan', 'orang']);

			$penindakan = Penindakan::create([
				'sprint_id' => $this->faker->numberBetween(1,10),
				'tanggal_penindakan' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'lokasi_penindakan' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
			]);

			$max_sbp = $this->model::max('no_dok');
			$crn_sbp = $max_sbp + 1;
			$sbp = $this->model::create([
				'no_dok' => $crn_sbp,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $crn_sbp . $this->agenda . date("Y"),
				'uraian_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'alasan_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'jenis_pelanggaran' => $this->faker->randomElement(['Kepabeanan', 'Cukai']),
				'wkt_mulai_penindakan' => $this->faker->dateTime(),
				'wkt_selesai_penindakan' => $this->faker->dateTime(),
				'hal_terjadi' => $this->faker->text(),
				'kode_status' => 200,
			]);

			$tipe_surat_lptp = $this->switchObject($this->tipe_lptp, 'tipe_dok');
			$agenda_lptp = $this->switchObject($this->tipe_lptp, 'agenda');
			$max_lptp = $this->model_lptp::max('no_dok');
			$crn_lptp = $max_lptp + 1;
			$lptp = $this->model_lptp::create([
				'no_dok' => $crn_lptp,
				'agenda_dok' => $agenda_lptp,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat_lptp . '-' . $crn_lptp . $agenda_lptp . date("Y"),
				'jabatan_atasan' => 'bd.0503',
				'plh' => false,
				'atasan_id' => 4,
				'kode_status' => 200,
			]);

			// Create relation Penindakan - SBP
			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => $this->tipe_dok,
				'object2_id' => $sbp->id,
			]);

			// Create relation SBP - LPTP
			ObjectRelation::create([
				'object1_type' => $this->tipe_dok,
				'object1_id' => $sbp->id,
				'object2_type' => $this->tipe_lptp,
				'object2_id' => $lptp->id,
			]);

			switch ($objek_penindakan) {
				case 'sarkut':
					$object = $this->createSarkut();
					$object_id = $object->id;
					$this->createRiksa($penindakan->id);
					$this->createTegah($penindakan->id);
					$this->createSegel($penindakan->id);
					break;

				case 'barang':
					$object = $this->createBarang();
					$object_id = $object->id;
					$this->createRiksa($penindakan->id);
					$this->createTegah($penindakan->id);
					$this->createSegel($penindakan->id);
					break;

				case 'bangunan':
					$object = $this->createBangunan();
					$object_id = $object->id;
					$this->createRiksa($penindakan->id);
					$this->createSegel($penindakan->id);
					break;

				case 'orang':
					$object_id = $this->faker->numberBetween(1,10);
				
				default:
					# code...
					break;
			}

			$penindakan->update([
				'object_type' => $objek_penindakan,
				'object_id' => $object_id
			]);

			$is_tolak1 = $this->faker->boolean();
			if ($is_tolak1) {
				$tolak1 = $this->createTolak1($sbp->id);

				$is_tolak2 = $this->faker->boolean();
				if ($is_tolak2) {
					$this->createTolak2($tolak1->id, $sbp->id);
				}
			}
		}
    }

	private function createSarkut()
	{
		$sarkut = DetailSarkut::create([
			'nama_sarkut' => $this->faker->company(),
			'jenis_sarkut' => 'Pesawat',
			'no_flight_trayek' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'jumlah_kapasitas' => $this->faker->numberBetween(1, 100),
			'satuan_kapasitas' => $this->faker->regexify('[A-Z]{3}'),
			'pilot_id' => $this->faker->numberBetween(1, 100),
			'bendera' => $this->faker->countryCode(),
			'no_reg_polisi' => $this->faker->regexify('[A-Z]{5}'),
		]);

		return $sarkut;
	}

	public function createBarang()
	{
		$barang = DetailBarang::create([
			'jumlah_kemasan' => $this->faker->numberBetween(1, 100),
			'satuan_kemasan' => $this->faker->regexify('[a-z]{2}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100)
		]);

		DetailBarang::find($barang->id)
			->dokumen()
			->create([
				'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
				'no_dok' => $this->faker->numberBetween(1, 999999),
				'tgl_dok' => $this->faker->date()
			]);

		$item_count = $this->faker->numberBetween(1, 10);
		for ($i=0; $i < $item_count; $i++) { 
			DetailBarang::find($barang->id)
				->itemBarang()
				->create([
					'jumlah_barang' => $this->faker->numberBetween(1, 100),
					'satuan_barang' => $this->faker->regexify('[a-z]{2}'),
					'uraian_barang' => $this->faker->text()
				]);
		}

		return $barang;
	}

	private function createBangunan()
	{
		$bangunan = DetailBangunan::create([
			'alamat' => $this->faker->address(),
			'no_reg' => $this->faker->regexify('[0-9]{15}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100),
		]);

		return $bangunan;
	}

	private function createRiksa($penindakan_id)
	{
		$tipe_surat_riksa = $this->switchObject('riksa', 'tipe_dok');
		$agenda_riksa = $this->switchObject('riksa', 'agenda');
		$max_riksa = DokRiksa::max('no_dok');
		$crn_riksa = $max_riksa + 1;
		$tegah = DokRiksa::create([
			'no_dok' => $crn_riksa,
			'agenda_dok' => $agenda_riksa,
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => $tipe_surat_riksa . '-' . $crn_riksa . $agenda_riksa . date("Y"),
			'kode_status' => 200,
		]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'riksa',
			'object2_id' => $tegah->id,
		]);
	}

	private function createTegah($penindakan_id)
	{
		$tipe_surat_tegah = $this->switchObject('tegah', 'tipe_dok');
		$agenda_tegah = $this->switchObject('tegah', 'agenda');
		$max_tegah = DokTegah::max('no_dok');
		$crn_tegah = $max_tegah + 1;
		$tegah = DokTegah::create([
			'no_dok' => $crn_tegah,
			'agenda_dok' => $agenda_tegah,
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => $tipe_surat_tegah . '-' . $crn_tegah . $agenda_tegah . date("Y"),
			'kode_status' => 200,
		]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'tegah',
			'object2_id' => $tegah->id,
		]);
	}

	private function createSegel($penindakan_id)
	{
		$tipe_surat_segel = $this->switchObject('segel', 'tipe_dok');
		$agenda_segel = $this->switchObject('segel', 'agenda');
		$max_segel = DokSegel::max('no_dok');
		$crn_segel = $max_segel + 1;
		$segel = DokSegel::create([
			'no_dok' => $crn_segel,
			'agenda_dok' => $agenda_segel,
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => $tipe_surat_segel . '-' . $crn_segel . $agenda_segel . date("Y"),
			'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
			'jumlah_segel' => $this->faker->numberBetween(1,5),
			'satuan_segel' => $this->faker->randomElement(['lembar', 'buah']),
			'tempat_segel' => $this->faker->word(),
			'nomor_segel' => $tipe_surat_segel . '-' . $crn_segel . $agenda_segel . date("Y"),
			'kode_status' => 200,
		]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'segel',
			'object2_id' => $segel->id,
		]);
	}

	private function createTolak1($sbp_id)
	{
		$tipe_surat_tolak = $this->switchObject('tolak1', 'tipe_dok');
		$agenda_tolak = $this->switchObject('tolak1', 'agenda');
		$max_tolak = DokTolakSbp1::max('no_dok');
		$crn_tolak = $max_tolak + 1;
		$tolak = DokTolakSbp1::create([
			'sprint_id' => $this->faker->numberBetween(1,10),
			'no_dok' => $crn_tolak,
			'agenda_dok' => $agenda_tolak,
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => $tipe_surat_tolak . '-' . $crn_tolak . $agenda_tolak . date("Y"),
			'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
			'alasan' => $this->faker->text(),
			'petugas1_id' => 1,
			'petugas2_id' => 2,
			'kode_status' => 200,
		]);

		ObjectRelation::create([
			'object1_type' => $this->tipe_dok,
			'object1_id' => $sbp_id,
			'object2_type' => 'tolak1',
			'object2_id' => $tolak->id,
		]);

		$this->model::find($sbp_id)->update(['status_tolak' => 1]);

		return $tolak;
	}

	private function createTolak2($tolak1_id, $sbp_id)
	{
		$tipe_surat_tolak = $this->switchObject('tolak2', 'tipe_dok');
		$agenda_tolak = $this->switchObject('tolak2', 'agenda');
		$max_tolak = DokTolakSbp2::max('no_dok');
		$crn_tolak = $max_tolak + 1;
		$tolak2 = DokTolakSbp2::create([
			'sprint_id' => $this->faker->numberBetween(1,10),
			'no_dok' => $crn_tolak,
			'agenda_dok' => $agenda_tolak,
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => $tipe_surat_tolak . '-' . $crn_tolak . $agenda_tolak . date("Y"),
			'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
			'alasan' => $this->faker->text(),
			'saksi_id' => $this->faker->numberBetween(1, 100),
			'petugas1_id' => 1,
			'petugas2_id' => 2,
			'kode_status' => 200,
		]);

		ObjectRelation::create([
			'object1_type' => 'tolak1',
			'object1_id' => $tolak1_id,
			'object2_type' => 'tolak2',
			'object2_id' => $tolak2->id,
		]);

		DokTolakSbp1::find($tolak1_id)->update(['status_tolak' => 1]);
		$this->model::find($sbp_id)->update(['status_tolak' => 2]);
	}
}
