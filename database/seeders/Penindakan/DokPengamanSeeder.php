<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\DokPengaman;
use App\Models\Penindakan\Penindakan;
use App\Models\Penomoran;
use App\Models\References\RefLokasi;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class DokPengamanSeeder extends Seeder
{
	use ObjekPenindakanSeederTrait;

	public function __construct($kode_dokumen='pengaman')
	{
		$this->kode_dokumen = $kode_dokumen;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		// Current year
		$year = date("Y");

		// References
		$lokasi = RefLokasi::select('lokasi')->get();

        for ($i=1; $i < 21; $i++) { 
			$chain = DocumentsChain::create();

			/**
			 * Penindakan
			 */

			// Create penindakan
			$penindakan = new Penindakan();
			$penindakan->sprint_id = $faker->numberBetween(1,10);
			$penindakan->chain_id = $chain->id;
			$penindakan->tanggal_selesai_penindakan = $faker->dateTimeThisYear()->format('Y-m-d');
			$penindakan->lokasi_penindakan = $faker->randomElement($lokasi)->lokasi;
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

			/**
			 * BA Pengaman
			 */

			// Create BA Pengaman
			$creator = $faker->randomElement(['123456', '665544']);

			$max_pengaman = DokPengaman::max('no_dok');
			$no_current = $max_pengaman + 1;

			$pengaman = new DokPengaman();
			$pengaman->no_dok = $no_current;
			$pengaman->agenda_dok = $pengaman->agenda_dokumen;
			$pengaman->thn_dok = $year;
			$pengaman->no_dok_lengkap = "{$pengaman->tipe_dokumen}-{$no_current}{$pengaman->agenda_dokumen}{$year}";
			$pengaman->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$pengaman->chain_id = $chain->id;
			$pengaman->alasan_pengamanan =  $faker->sentence($nbWOrds = 20);
			$pengaman->keterangan =  $faker->sentence($nbWOrds = 20);
			$pengaman->jenis_pengaman =  $faker->randomElement(['Kertas', 'Timah', 'Gembok']);
			$pengaman->jumlah_pengaman =  $faker->numberBetween(1,5);
			$pengaman->satuan_pengaman =  $faker->randomElement(['lembar', 'buah']);
			$pengaman->nomor_pengaman =  "{$pengaman->tipe_dokumen}-{$no_current}{$pengaman->agenda_dokumen}{$year}";
			$pengaman->tempat_pengaman =  $faker->word();
			$pengaman->kode_status = 'terbit';
			$pengaman->created_by = $creator;
			$pengaman->updated_by = $creator;
			$pengaman->saveQuietly();

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $pengaman->kode_dokumen]);
		}

		Penomoran::create([
			'tipe_dokumen' => $pengaman->tipe_dokumen,
			'agenda' => $pengaman->agenda_dokumen,
			'tahun' => $year,
			'nomor_terakhir' => $no_current,
		]);
    }
}
