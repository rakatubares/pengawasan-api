<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\DokRiksa;
use App\Models\Penindakan\DokRiksaBadan;
use App\Models\Penindakan\DokSegel;
use App\Models\Penindakan\DokTegah;
use App\Models\Penindakan\DokTolakSbp1;
use App\Models\Penindakan\DokTolakSbp2;
use App\Models\Penindakan\Penindakan;
use App\Models\Penomoran;
use App\Models\References\RefKategoriPelanggaran;
use App\Models\References\RefLokasi;
use App\Models\References\RefTembusan;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokSbpSeeder extends Seeder
{
	use ObjekPenindakanSeederTrait;

	protected $kode_dokumen='sbp';

	public function __construct()
	{
		$this->model_sbp = Relation::getMorphedModel($this->kode_dokumen);
		$sbp = new $this->model_sbp;
		$this->kode_nhi = $sbp->kode_nhi;
		$this->kode_lap = $sbp->kode_lap;
		$this->kode_lptp = $sbp->kode_lptp;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		$kode_nhi = $this->kode_nhi;
		$kode_lap = $this->kode_lap;

		// Get lap ids
		$model_lap = Relation::getMorphedModel($this->kode_lap);
		$lap_ids = $model_lap::select('id')
			->where(['flag_layak_penindakan' => true])
			->get()
			->toArray();

		$available_lap_id = [];
		foreach ($lap_ids as $key => $value) {
			$available_lap_id[] = $value['id'];
		}

		// References
		$lokasi = RefLokasi::select('lokasi')->get();
		$list_kategori_pelanggaran = RefKategoriPelanggaran::all('id')->toArray();

		// Current year
		$year = date("Y");

        for ($i=1; $i < 51; $i++) {
			// Get data lap
			$from_lap = false;
			if (sizeof($available_lap_id)) {
				$from_lap = $faker->boolean();
			}
			
			if ($from_lap) {
				$lap_id = $faker->randomElement($available_lap_id);
				$key = array_search($lap_id, $available_lap_id);
				unset($available_lap_id[$key]);
				$lap = $model_lap::find($lap_id);
				$chain = $lap->chain;
				$lap->followedUp();

				// Check NHI
				if ($chain->$kode_nhi) { $chain->$kode_nhi->followedUp('status_sbp'); }
			} else {
				$chain = DocumentsChain::create();
			}

			/**
			 * Create Penindakan
			 */
			if ($from_lap) {
				if ($chain->$kode_nhi) {
					$lokasi_penindakan = $chain->$kode_nhi->tempat_indikasi;
				} else {
					$lokasi_penindakan = $faker->randomElement($lokasi)->lokasi;
				}
				$kategori_pelanggaran_id = $chain->$kode_lap->dugaan_pelanggaran_id;
			} else {
				$lokasi_penindakan = $faker->randomElement($lokasi)->lokasi;
				$kategori_pelanggaran = $faker->randomElement($list_kategori_pelanggaran);
				$kategori_pelanggaran_id = $kategori_pelanggaran['id'];
			}

			$penindakan = new Penindakan();
			$penindakan->sprint_id = $faker->numberBetween(1,10);
			$penindakan->chain_id = $chain->id;
			$penindakan->tanggal_mulai_penindakan = $faker->dateTimeThisYear()->format('Y-m-d');
			$penindakan->waktu_mulai_penindakan = $faker->time();
			$penindakan->tanggal_selesai_penindakan = $faker->dateTimeThisYear()->format('Y-m-d');
			$penindakan->waktu_selesai_penindakan = $faker->time();
			$penindakan->lokasi_penindakan = $lokasi_penindakan;
			$penindakan->kategori_penindakan_id = $kategori_pelanggaran_id;
			$penindakan->uraian_penindakan = $faker->sentence($nbWOrds = 20);
			$penindakan->alasan_penindakan = $faker->sentence($nbWOrds = 20);
			$penindakan->jenis_pelanggaran = $faker->randomElement(['Kepabeanan', 'Cukai']);
			$penindakan->hal_terjadi = $faker->text();
			$penindakan->saksi_id = $faker->numberBetween(1,100);
			$penindakan->save();

			// Petugas
			$petugas1 = [
				'posisi' => 'petugas1', 
				'flag_pejabat' => false, 
				'nip' => '123456',
			];
			$penindakan->detail_petugas()->create($petugas1);

			$with_petugas2 = $faker->boolean();
			if ($with_petugas2) {
				$petugas2 = [
					'posisi' => 'petugas2', 
					'flag_pejabat' => false, 
					'nip' => '665544',
				];
				$penindakan->detail_petugas()->create($petugas2);
			}

			/**
			 * Create SBP
			 */
			$creator = $faker->randomElement(['123456', '665544']);

			$max_sbp = $this->model_sbp::max('no_dok');
			$crn_sbp = $max_sbp + 1;
			$tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');

			$sbp = new $this->model_sbp;
			$sbp->no_dok = $crn_sbp;
			$sbp->agenda_dok = $sbp->agenda_dokumen;
			$sbp->thn_dok = $year;
			$sbp->no_dok_lengkap = "{$sbp->tipe_dokumen}-{$crn_sbp}{$sbp->agenda_dokumen}{$year}";
			$sbp->tanggal_dokumen = $tanggal_dokumen;
			$sbp->chain_id = $chain->id;
			$sbp->kode_status = 'terbit';
			$sbp->status_tindak_lanjut = true;
			$sbp->created_by = $creator;
			$sbp->updated_by = $creator;
			$sbp->saveQuietly();

			/**
			 * Create LPTP
			 */
			$model_lptp = Relation::getMorphedModel($this->kode_lptp);
			$max_lptp = $model_lptp::max('no_dok');
			$crn_lptp = $max_lptp + 1;

			$lptp = new $model_lptp;
			$lptp->no_dok = $crn_lptp;
			$lptp->agenda_dok = $lptp->agenda_dokumen;
			$lptp->thn_dok = $year;
			$lptp->no_dok_lengkap = "{$lptp->tipe_dokumen}-{$crn_lptp}{$lptp->agenda_dokumen}{$year}";
			$lptp->tanggal_dokumen = $tanggal_dokumen;
			$lptp->chain_id = $chain->id;
			$lptp->catatan = $faker->sentence($nbWOrds = 10);
			$lptp->kode_status = 'terbit';
			$lptp->created_by = $creator;
			$lptp->updated_by = $creator;
			$lptp->saveQuietly();

			// Atasan
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '258']) : '111';
			$pejabat = ['posisi' => 'atasan', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0503', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$lptp->detail_petugas()->create($pejabat);

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
				$lptp->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
			}

			/**
			 * Objek penindakan
			 */

			// Sarkut
			$with_sarkut = $faker->boolean();
			if ($with_sarkut) {
				$this->createSarkut($penindakan);
			}

			// Barang
			$with_barang = $faker->boolean();
			if ($with_barang) {
				$this->createBarang($penindakan);
			}

			// Bangunan
			$with_bangunan = $faker->boolean();
			if ($with_bangunan) {
				$this->createBangunan($penindakan);
			}

			// Badan
			$with_badan = $faker->boolean();
			if ($with_badan) {
				$this->createBadan($penindakan);
			}

			/**
			 * BA Penindakan
			 */

			// BA Pemeriksaan Badan
			if ($with_badan) {
				$with_riksa_badan = $faker->boolean();
				if ($with_riksa_badan) {
					// Get max riksa badan number
					$max_riksa_badan = DokRiksaBadan::max('no_dok');
					$crn_riksa_badan = $max_riksa_badan + 1;

					// Create BA Riksa Badan
					$riksa_badan = new DokRiksaBadan();
					$riksa_badan->no_dok = $crn_riksa_badan;
					$riksa_badan->agenda_dok = $riksa_badan->agenda_dokumen;
					$riksa_badan->thn_dok = $year;
					$riksa_badan->no_dok_lengkap = "{$riksa_badan->tipe_dokumen}-{$crn_riksa_badan}{$riksa_badan->agenda_dokumen}{$year}";
					$riksa_badan->tanggal_dokumen = $tanggal_dokumen;
					$riksa_badan->chain_id = $chain->id;
					$riksa_badan->kode_status = 'terbit';
					$riksa_badan->created_by = $creator;
					$riksa_badan->updated_by = $creator;
					$riksa_badan->saveQuietly();
				}
			}
			
			// BA Pemeriksaan
			if ($with_sarkut || $with_barang || $with_bangunan) {
				$with_riksa = $faker->boolean();
				if ($with_riksa) {
					// Get max riksa number
					$max_riksa = DokRiksa::max('no_dok');
					$crn_riksa = $max_riksa + 1;

					// Create BA Riksa
					$riksa = new DokRiksa();
					$riksa->no_dok = $crn_riksa;
					$riksa->agenda_dok = $riksa->agenda_dokumen;
					$riksa->thn_dok = $year;
					$riksa->no_dok_lengkap = "{$riksa->tipe_dokumen}-{$crn_riksa}{$riksa->agenda_dokumen}{$year}";
					$riksa->tanggal_dokumen = $tanggal_dokumen;
					$riksa->chain_id = $chain->id;
					$riksa->kode_status = 'terbit';
					$riksa->created_by = $creator;
					$riksa->updated_by = $creator;
					$riksa->saveQuietly();
				}
			}

			// BA Penegahan
			if ($with_sarkut || $with_barang) {
				$with_tegah = $faker->boolean();
				if ($with_tegah) {
					// Get max tegah number
					$max_tegah = DokTegah::max('no_dok');
					$crn_tegah = $max_tegah + 1;

					// Create BA Penegahan
					$tegah = new DokTegah();
					$tegah->no_dok = $crn_tegah;
					$tegah->agenda_dok = $tegah->agenda_dokumen;
					$tegah->thn_dok = $year;
					$tegah->no_dok_lengkap = "{$tegah->tipe_dokumen}-{$crn_tegah}{$tegah->agenda_dokumen}{$year}";
					$tegah->tanggal_dokumen = $tanggal_dokumen;
					$tegah->chain_id = $chain->id;
					$tegah->kode_status = 'terbit';
					$tegah->created_by = $creator;
					$tegah->updated_by = $creator;
					$tegah->saveQuietly();
				}
			}

			// BA Penyegelan
			if ($with_sarkut || $with_barang || $with_bangunan) {
				$with_segel = $faker->boolean();
				if ($with_segel) {
					// Get max tegah number
					$max_segel = DokSegel::max('no_dok');
					$crn_segel = $max_segel + 1;

					// Create BA Penegahan
					$segel = new DokSegel();
					$segel->no_dok = $crn_segel;
					$segel->agenda_dok = $segel->agenda_dokumen;
					$segel->thn_dok = $year;
					$segel->no_dok_lengkap = "{$segel->tipe_dokumen}-{$crn_segel}{$segel->agenda_dokumen}{$year}";
					$segel->tanggal_dokumen = $tanggal_dokumen;
					$segel->chain_id = $chain->id;
					$segel->jenis_segel = $faker->randomElement(['Kertas', 'Timah', 'Gembok']);
					$segel->jumlah_segel = $faker->numberBetween(1,5);
					$segel->satuan_segel = $faker->randomElement(['lembar', 'buah']);
					$segel->nomor_segel = "{$segel->tipe_dokumen}-{$crn_segel}{$segel->agenda_dokumen}{$year}";
					$segel->tempat_segel = $faker->word();
					$segel->kode_status = 'terbit';
					$segel->created_by = $creator;
					$segel->updated_by = $creator;
					$segel->saveQuietly();
				}
			}

			/**
			 * BA Penolakan
			 */
			$is_tolak1 = $faker->boolean();
			if ($is_tolak1) {
				// Create tolak 1
				$max_tolak1 = DokTolakSbp1::max('no_dok');
				$crn_tolak1 = $max_tolak1 + 1;

				$tolak1 = new DokTolakSbp1();
				$tolak1->no_dok = $crn_tolak1;
				$tolak1->agenda_dok = $tolak1->agenda_dokumen;
				$tolak1->thn_dok = $year;
				$tolak1->no_dok_lengkap = "{$tolak1->tipe_dokumen}-{$crn_tolak1}{$tolak1->agenda_dokumen}{$year}";
				$tolak1->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
				$tolak1->chain_id = $chain->id;
				$tolak1->parent_type = $sbp->kode_dokumen;
				$tolak1->parent_id = $sbp->id;
				$tolak1->alasan = $faker->text();
				$tolak1->kode_status = 'terbit';
				$tolak1->created_by = $creator;
				$tolak1->updated_by = $creator;
				$tolak1->saveQuietly();

				// Update flag tolak sbp
				$sbp->update(['status_tolak' => true]);

				// Penolakan 2
				$is_tolak2 = $faker->boolean();
				if ($is_tolak2) {
					// Create tolak 2
					$max_tolak2 = DokTolakSbp2::max('no_dok');
					$crn_tolak2 = $max_tolak2 + 1;

					$tolak2 = new DokTolakSbp2();
					$tolak2->no_dok = $crn_tolak2;
					$tolak2->agenda_dok = $tolak2->agenda_dokumen;
					$tolak2->thn_dok = $year;
					$tolak2->no_dok_lengkap = "{$tolak2->tipe_dokumen}-{$crn_tolak2}{$tolak2->agenda_dokumen}{$year}";
					$tolak2->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
					$tolak2->chain_id = $chain->id;
					$tolak2->tolak1_id = $tolak1->id;
					$tolak2->alasan = $faker->text();
					$tolak2->saksi_id = $faker->numberBetween(1,100);
					$tolak2->kode_status = 'terbit';
					$tolak2->created_by = $creator;
					$tolak2->updated_by = $creator;
					$tolak2->saveQuietly();

					// Update flag tolak ba tolak 1
					$tolak1->update(['status_tolak' => true]);
				}
			}

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lptp->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */

		// SBP
		Penomoran::upsert([
			'tipe_dokumen' => $sbp->tipe_dokumen,
			'agenda' => $sbp->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_sbp,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// Tolak 1
		Penomoran::upsert([
			'tipe_dokumen' => $tolak1->tipe_dokumen,
			'agenda' => $tolak1->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_tolak1,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// Tolak 2
		Penomoran::upsert([
			'tipe_dokumen' => $tolak2->tipe_dokumen,
			'agenda' => $tolak2->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_tolak2,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// LPTP
		Penomoran::upsert([
			'tipe_dokumen' => $lptp->tipe_dokumen,
			'agenda' => $lptp->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lptp,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// BA Pemeriksaan Badan
		Penomoran::upsert([
			'tipe_dokumen' => $riksa_badan->tipe_dokumen,
			'agenda' => $riksa_badan->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_riksa_badan,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// BA Pemeriksaan
		Penomoran::upsert([
			'tipe_dokumen' => $riksa->tipe_dokumen,
			'agenda' => $riksa->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_riksa,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// BA Penegahan
		Penomoran::upsert([
			'tipe_dokumen' => $tegah->tipe_dokumen,
			'agenda' => $tegah->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_tegah,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);

		// BA Penyegelan
		Penomoran::upsert([
			'tipe_dokumen' => $segel->tipe_dokumen,
			'agenda' => $segel->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_segel,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);
    }
}
