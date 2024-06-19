<?php

namespace Database\Seeders;

use App\Models\DokContoh;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokContohSeeder extends Seeder
{
	use DetailSeederTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'contoh';
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
        for ($d=1; $d < 21; $d++) { 
			$max_contoh = DokContoh::max('no_dok');
			$crn_contoh = $max_contoh + 1;

			$contoh = DokContoh::create([
				'no_dok' => $crn_contoh,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $crn_contoh . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $this->faker->numberBetween(1,10),
				'lokasi' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
			]);

			$barang = $this->createBarang();
			$contoh->update([
				'object_type' => 'barang',
				'object_id' => $barang->id
			]);
		}
    }
}
