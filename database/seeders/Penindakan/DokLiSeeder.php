<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\DokLi;
use App\Models\Penomoran;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLiSeeder extends Seeder
{
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

		for ($i=1; $i < 21; $i++) { 
			// Get current doc number
			$max_li = DokLi::max('no_dok');
			$no_current = $max_li + 1;

			// Create document chain
			$chain = DocumentsChain::create();

			// Create LI
			$creator = $faker->randomElement(['123456', '665544']);

			$li = new DokLi();
			$li->no_dok = $no_current;
			$li->agenda_dok = $li->agenda_dokumen;
			$li->thn_dok = $year;
			$li->no_dok_lengkap = "{$li->tipe_dokumen}-{$no_current}{$li->agenda_dokumen}{$year}";
			$li->tanggal_dokumen = $faker->dateTimeThisYear()->format('Y-m-d');
			$li->chain_id = $chain->id;
			$li->sumber = $faker->sentence($nbWOrds = 10);
			$li->informasi = $faker->sentence($nbWOrds = 40);
			$li->tindak_lanjut = $faker->sentence($nbWOrds = 20);
			$li->catatan = $faker->sentence($nbWOrds = 20);
			$li->kode_status = 'terbit';
			$li->created_by = $creator;
			$li->updated_by = $creator;
			$li->saveQuietly();

			/**
			 * Petugas
			 */

			// Pejabat
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '2222', '147', '258']) : '111';
			$pejabat = ['posisi' => 'penerbit', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.0503', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$li->detail_petugas()->create($pejabat);

			// Atasan
			$tipe_ttd = $faker->randomElement(['plh', 'plt', null]);
			$nip_pejabat = $tipe_ttd != null ? $faker->randomElement(['258', '111', '2222', '147']) : '555';
			$pejabat = ['posisi' => 'atasan', 'flag_pejabat' => true, 'kode_jabatan' => 'bd.05', 'tipe_ttd' => $tipe_ttd, 'nip' => $nip_pejabat];
			$li->detail_petugas()->create($pejabat);

			/**
			 * Documents chain
			 */
			$chain->update(['latest_document' => $li->kode_dokumen]);
		}

		Penomoran::create([
			'tipe_dokumen' => $li->tipe_dokumen,
			'agenda' => $li->agenda_dokumen,
			'tahun' => date('Y'),
			'nomor_terakhir' => $no_current,
		]);
    }
}
