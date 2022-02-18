<?php

namespace Database\Seeders;

use App\Models\DokLi;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLiSeeder extends Seeder
{
	use SwitcherTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		$tipe_dok = 'li';
		$tipe_surat = $this->switchObject($tipe_dok, 'tipe_dok');
		$agenda = $this->switchObject($tipe_dok, 'agenda');

		for ($i=1; $i < 21; $i++) { 
			// Get current doc number
			$max_li = DokLi::max('no_dok');
			$no_current = $max_li + 1;

			// Pejabat penerbit
			$pejabat = [
				'bd.0503' => 4,
				'bd.0504' => 5,
			];
			$jabatan_penerbit = $faker->randomElement(['bd.0503', 'bd.0504']);
			$penerbit_id = $pejabat[$jabatan_penerbit];

			// Create LI
			DokLi::create([
				'no_dok' => $no_current,
				'agenda_dok' => $agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_surat . '-' . $no_current . $agenda . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'sumber' => $faker->sentence($nbWOrds = 10),
				'informasi' => $faker->sentence($nbWOrds = 40),
				'tindak_lanjut' => $faker->sentence($nbWOrds = 20),
				'catatan' => $faker->sentence($nbWOrds = 20),
				'kode_jabatan_penerbit' => $jabatan_penerbit,
				'plh_penerbit' => false,
				'penerbit_id' => $penerbit_id,
				'kode_jabatan_atasan' => 'bd.05',
				'plh_atasan' => false,
				'atasan_id' => 3,
				'kode_status' => 200,
			]);
		}
    }
}
