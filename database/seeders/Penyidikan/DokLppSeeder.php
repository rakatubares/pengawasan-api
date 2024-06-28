<?php

namespace Database\Seeders\Penyidikan;

use App\Models\Penindakan\DokLp;
use App\Models\Penindakan\DokLpN;
use App\Models\Penomoran;
use App\Models\Penyidikan\DokLpp;
use App\Models\Penyidikan\Penyidikan;
use App\Models\Penyidikan\PenyidikanBhp;
use App\Models\References\RefKategoriPelanggaran;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLppSeeder extends Seeder
{
	protected $kode_dokumen = 'lpp';

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
			'penangkapan',
		];

		$faker = Faker::create();

		// Current year
		$year = date("Y");

		// References
		$list_kategori_pelanggaran = RefKategoriPelanggaran::select('id')->get();

		/**
		 * Source
		 */
		$available_lp = [];

		// LP
		$max_lp_id = DokLp::max('id');
		$available_lp['lp'] = range(1, $max_lp_id);

		// LP-N
		$max_lpn_id = DokLpN::max('id');
		$available_lp['lpn'] = range(1, $max_lpn_id);

		for ($i=1; $i < 26; $i++) {
			// Get source data
			$source_type = $faker->randomElement(['lp', 'lpn']);
			$source_id = $faker->randomElement($available_lp[$source_type]);
			$key = array_search($source_id, $available_lp[$source_type]);
			unset($available_lp[$source_type][$key]);
			$lp = $source_type == 'lp' ? DokLp::find($source_id) : DokLpN::find($source_id);
			$lp->followedUp();

			// Prepare data
			$pasal = $faker->numberBetween(1, 100);
			$ayat = $faker->numberBetween(1, 10);
			$chain = $lp->chain;
			$penindakan = $chain->penindakan;

			// Create penyidikan
			$penyidikan = Penyidikan::create([
				'chain_id' => $chain->id,
				'jenis_pelanggaran' => $faker->sentence($nbWOrds = 20),
				'pasal' => 'pasal ' . $pasal . ' ayat (' . $ayat . ')',
				'tempat_pelanggaran' => $penindakan->lokasi_penindakan,
				'tanggal_pelanggaran' => $penindakan->tanggal_selesai_penindakan,
				'waktu_pelanggaran' => $penindakan->waktu_selesai_penindakan,
				'modus' => $faker->sentence($nbWOrds = 40),
				'pelaku_id' => $penindakan->saksi_id,
				'tertangkap_tangan' => $faker->boolean(),
			]);

			// Create BHP
			$barang = $penindakan->barang;
			$sarkut = $penindakan->sarkut;

			$bhp = new PenyidikanBhp();
			$bhp->penyidikan_id = $penyidikan->id;
			$bhp->jumlah_kemasan = $barang ? $barang->jumlah_kemasan : null;
			$bhp->jenis_kemasan_id = $barang ? $barang->jenis_kemasan_id : null;
			$bhp->nomor_kemasan = $barang ? $barang->nomor_kemasan : null;
			$bhp->jenis_dokumen = $barang ? $barang->jenis_dokumen : null;
			$bhp->nomor_dokumen = $barang ? $barang->nomor_dokumen : null;
			$bhp->tanggal_dokumen = $barang ? $barang->tanggal_dokumen : null;
			$bhp->nama_sarkut = $sarkut ? $sarkut->nama_sarkut : null;
			$bhp->jenis_sarkut = $sarkut ? $sarkut->jenis_sarkut : null;
			$bhp->nomor_sarkut = $sarkut ? $sarkut->nomor_sarkut : null;
			$bhp->registrasi_sarkut = $sarkut ? $sarkut->registrasi_sarkut : null;
			$bhp->nomor_kontainer = $sarkut ? $sarkut->nomor_kontainer : null;
			$bhp->ukuran_kontainer = $sarkut ? $sarkut->ukuran_kontainer : null;
			$bhp->save();

			if ($barang) {
				$item_barang = $barang->barang->toArray();
				foreach ($item_barang as $item) {
					unset($item['id']);
					$bhp->barang()->create($item);
				}
			}

			// Create LPP
			$creator = $faker->randomElement(['123456', '665544']);

			$max_lpp = DokLpp::max('no_dok');
			$crn_lpp = $max_lpp + 1;
			$tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');

			$lpp = new DokLpp();
			$lpp->no_dok = $crn_lpp;
			$lpp->agenda_dok = $lpp->agenda_dokumen;
			$lpp->thn_dok = $year;
			$lpp->no_dok_lengkap = "{$lpp->tipe_dokumen}-{$crn_lpp}{$lpp->agenda_dokumen}{$year}";
			$lpp->tanggal_dokumen = $tanggal_dokumen;
			$lpp->chain_id = $chain->id;
			$lpp->asal_perkara = $faker->sentence($nbWOrds = 5);
			$lpp->jenis_penindakan = $faker->randomElement($list_jenis_penindakan);
			$lpp->jenis_perkara_id = $faker->randomElement($list_kategori_pelanggaran)->id;
			$lpp->catatan = $faker->sentence($nbWOrds = 20);
			$lpp->kode_status = 'terbit';
			$lpp->created_by = $creator;
			$lpp->updated_by = $creator;
			$lpp->saveQuietly();

			/**
			 * Petugas
			 */

			// Petugas
			$penyusun = [
				'posisi' => 'penyusun', 
				'flag_pejabat' => false, 
				'nip' => '123456',
			];
			$lpp->detail_petugas()->create($penyusun);

			// Atasan 1
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '74158';
			$pejabat = [
				'posisi' => 'atasan1', 
				'flag_pejabat' => true, 
				'kode_jabatan' => 'bd.0505', 
				'tipe_ttd' => $tipe_ttd, 
				'nip' => $nip_pejabat
			];
			$lpp->detail_petugas()->create($pejabat);

			// Atasan 2
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '111']) : '555';
			$pejabat = [
				'posisi' => 'atasan2', 
				'flag_pejabat' => true, 
				'kode_jabatan' => 'bd.05', 
				'tipe_ttd' => $tipe_ttd, 
				'nip' => $nip_pejabat
			];
			$lpp->detail_petugas()->create($pejabat);

			/**
			 * Update Chain
			 */
			$chain->update(['latest_document' => $lpp->kode_dokumen]);
		}

		/**
		 * Update penomoran
		 */
		Penomoran::create([
			'tipe_dokumen' => $lpp->tipe_dokumen,
			'agenda' => $lpp->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $crn_lpp,
		]);
	}
}
