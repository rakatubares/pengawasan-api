<?php

namespace Database\Seeders\Penindakan;

// use App\Models\ObjectRelation;

use App\Models\DocumentsChain;
use App\Models\Penomoran;
use App\Models\References\RefKategoriPelanggaran;
use App\Models\References\RefSkemaPenindakan;
// use App\Models\RefKategoriPelanggaran;
// use App\Models\RefSkemaPenindakan;
// use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokLapSeeder extends Seeder
{
	// use SwitcherTrait;

	public function __construct($kode_dokumen='lap')
	{
		$this->kode_dokumen = $kode_dokumen;
		$this->model_lap = Relation::getMorphedModel($this->kode_dokumen);
		$this->nama_informasi = [
			'nhi' => 'NHI',
			'li' => 'LI-1',
			'lainnya' => 'Lainnya'
		];
		$this->list_jenis_informasi = array_keys($this->nama_informasi);
		$lap = new $this->model_lap;
		$this->kode_nhi = $lap->kode_nhi;
		$this->kode_li = $lap->kode_li;
		// $this->seed_count = 20;
		// $this->prepareModel();
	}

	// protected function prepareModel()
	// {
	// 	$this->faker = Faker::create();
	// 	$this->tipe_surat = $this->switchObject($this->tipe_dok, 'tipe_dok');
	// 	$this->agenda = $this->switchObject($this->tipe_dok, 'agenda');
	// 	$this->model = $this->switchObject($this->tipe_dok, 'model');

	// 	$this->related_model = [];
	// 	$this->available_id = [];
	// 	foreach ($this->list_jenis_informasi as $jenis) {
	// 		if ($jenis != 'lainnya') {
	// 			$this->related_model[$jenis] = $this->switchObject($jenis, 'model');
	// 			$max_id = $this->related_model[$jenis]::max('id');
	// 			$this->available_id[$jenis] = range(1, $max_id);	
	// 		}
	// 	}
	// }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		// References
		$list_kategori_pelanggaran = RefKategoriPelanggaran::all('id')->toArray();
		$list_skema_penindakan = RefSkemaPenindakan::all('id');
		// $list_kode_jabatan = [
		// 	'bd.0503' => 4, 
		// 	'bd.0504' => 5
		// ];

		// Source
		$available_source_id = [];
		foreach ($this->list_jenis_informasi as $jenis) {
			if ($jenis != 'lainnya') {
				$source_model = Relation::getMorphedModel($jenis);
				$max_id = $source_model::max('id');
				$available_source_id[$jenis] = range(1, $max_id);	
			}
		}

		// Current year
		$year = date("Y");

        for ($i=1; $i < 21; $i++) { 
			$max_lap = $this->model_lap::max('no_dok');
			$no_current = $max_lap + 1;

			// Choose sumber
			$jenis_sumber = $faker->randomElement($this->list_jenis_informasi);
			if ($jenis_sumber != 'lainnya') {
				// Get related document data
				$source_id = $faker->randomElement($available_source_id[$jenis_sumber]);
				if (($key = array_search($source_id, $available_source_id[$jenis_sumber])) != false) {
					unset($available_source_id[$jenis_sumber][$key]);
				}
				$source_model = Relation::getMorphedModel($jenis_sumber);
				$source = $source_model::find($source_id);
				$source->update(['kode_status' => 'tindak-lanjut']);

				// Get doc number
				$nomor_sumber = $source->no_dok_lengkap;
				$tanggal_sumber = $source->tanggal_dokumen;

				// Chain
				$chain = $source->chain;
			} else {
				$nomor_sumber = $faker->numberBetween(1,1000);
				$tanggal_sumber = $faker->dateTimeThisYear()->format('Y-m-d');
				
				// Create document chain
				$chain = DocumentsChain::create();
			}

			$kategori_pelanggaran = $faker->randomElement($list_kategori_pelanggaran);

			$layak_penindakan = $faker->boolean();
			if ($layak_penindakan) {
				$skema_penindakan = $faker->randomElement($list_skema_penindakan);
				$skema_id = $skema_penindakan['id'];
				$ket_skema_penindakan = $faker->sentence($nbWords = 20);

				$layak_patroli = null;
				$ket_layak_patroli = null;
			} else {
				$skema_id = null;
				$ket_skema_penindakan = null;

				$layak_patroli = $faker->boolean();
				$ket_layak_patroli = $faker->sentence($nbWords = 20);
			}

			// $jabatan_penerbit = $this->faker->randomElement(['bd.0503', 'bd.0504']);
			// $penerbit_id = $list_kode_jabatan[$jabatan_penerbit];

			$lap = new $this->model_lap;
			$lap->no_dok = $no_current;
			$lap->agenda_dok = $lap->agenda_dokumen;
			$lap->thn_dok = $year;
			$lap->no_dok_lengkap = "{$lap->tipe_dokumen}-{$no_current}{$lap->agenda_dokumen}{$year}";
			$lap->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$lap->chain_id = $chain->id;
			$lap->jenis_sumber = $jenis_sumber;
			$lap->nomor_sumber = $nomor_sumber;
			$lap->tanggal_sumber = $tanggal_sumber;
			$lap->dugaan_pelanggaran_id = $kategori_pelanggaran['id'];
			$lap->flag_pelaku = $faker->boolean();
			$lap->keterangan_pelaku = $faker->sentence($nbWords = 20);
			$lap->flag_pelanggaran = $faker->boolean();
			$lap->keterangan_pelanggaran = $faker->sentence($nbWords = 20);
			$lap->flag_locus = $faker->boolean();
			$lap->keterangan_locus = $faker->sentence($nbWords = 20);
			$lap->flag_tempus = $faker->boolean();
			$lap->keterangan_tempus = $faker->sentence($nbWords = 20);
			$lap->flag_kewenangan = $faker->boolean();
			$lap->keterangan_kewenangan = $faker->sentence($nbWords = 20);
			$lap->flag_sdm = $faker->boolean();
			$lap->keterangan_sdm = $faker->sentence($nbWords = 20);
			$lap->flag_sarpras = $faker->boolean();
			$lap->keterangan_sarpras = $faker->sentence($nbWords = 20);
			$lap->flag_anggaran = $faker->boolean();
			$lap->keterangan_anggaran = $faker->sentence($nbWords = 20);
			$lap->flag_layak_penindakan = $layak_penindakan;
			$lap->skema_penindakan_id = $skema_id;
			$lap->keterangan_skema_penindakan = $ket_skema_penindakan;
			$lap->flag_layak_patroli = $layak_patroli;
			$lap->keterangan_patroli = $ket_layak_patroli;
			$lap->kesimpulan = $faker->sentence($nbWords = 20);
			$lap->kode_status = 'terbit';
			$lap->saveQuietly();
			
			/**
			 * Petugas
			 */

			// Penerbit
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '258']) : '111';
			$pejabat = ['posisi' => 'penerbit', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0503', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lap->detail_petugas()->create($pejabat);

			// Atasan
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '111', '2222', '147']) : '555';
			$pejabat = ['posisi' => 'atasan', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lap->detail_petugas()->create($pejabat);

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $lap->kode_dokumen]);

			// $lap = $this->model::create([
			// 	'no_dok' => $no_current,
			// 	'agenda_dok' => $this->agenda,
			// 	'thn_dok' => date("Y"),
			// 	'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
			// 	'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
			// 	'jenis_sumber' => $this->nama_informasi[$jenis_sumber],
			// 	'nomor_sumber' => $nomor_sumber,
			// 	'tanggal_sumber' => $tanggal_sumber,
			// 	'dugaan_pelanggaran_id' => $kategori_pelanggaran['id'],
			// 	'flag_pelaku' => $this->faker->boolean(),
			// 	'keterangan_pelaku' => $this->faker->sentence($nbWords = 20),
			// 	'flag_pelanggaran' => $this->faker->boolean(),
			// 	'keterangan_pelanggaran' => $this->faker->sentence($nbWords = 20),
			// 	'flag_locus' => $this->faker->boolean(),
			// 	'keterangan_locus' => $this->faker->sentence($nbWords = 20),
			// 	'flag_tempus' => $this->faker->boolean(),
			// 	'keterangan_tempus' => $this->faker->sentence($nbWords = 20),
			// 	'flag_kewenangan' => $this->faker->boolean(),
			// 	'keterangan_kewenangan' => $this->faker->sentence($nbWords = 20),
			// 	'flag_sdm' => $this->faker->boolean(),
			// 	'keterangan_sdm' => $this->faker->sentence($nbWords = 20),
			// 	'flag_sarpras' => $this->faker->boolean(),
			// 	'keterangan_sarpras' => $this->faker->sentence($nbWords = 20),
			// 	'flag_anggaran' => $this->faker->boolean(),
			// 	'keterangan_anggaran' => $this->faker->sentence($nbWords = 20),
			// 	'flag_layak_penindakan' => $layak_penindakan,
			// 	'skema_penindakan_id' => $skema_id,
			// 	'keterangan_skema_penindakan' => $ket_skema_penindakan,
			// 	'flag_layak_patroli' => $layak_patroli,
			// 	'keterangan_patroli' => $ket_layak_patroli,
			// 	'kesimpulan' => $this->faker->sentence($nbWords = 20),
			// 	'kode_jabatan_penerbit' => $jabatan_penerbit,
			// 	'plh_penerbit' => false,
			// 	'penerbit_id' => $penerbit_id,
			// 	'kode_jabatan_atasan' => 'bd.05',
			// 	'plh_atasan' => false,
			// 	'atasan_id' => 3,
			// 	'kode_status' => 200
			// ]);

			// // Create relation
			// if ($jenis_sumber != 'lainnya') {
			// 	ObjectRelation::create([
			// 		'object1_type' => $jenis_sumber,
			// 		'object1_id' => $related_doc->id,
			// 		'object2_type' => $this->tipe_dok,
			// 		'object2_id' => $lap->id,
			// 	]);
			// }
		}

		Penomoran::create([
			'tipe_dokumen' => $lap->tipe_dokumen,
			'agenda' => $lap->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $no_current,
		]);
    }
}
