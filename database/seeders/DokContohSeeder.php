<?php

namespace Database\Seeders;

use App\Models\DetailBarang;
use App\Models\DokContoh;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokContohSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$tipe_dok = $this->switchObject('contoh', 'tipe_dok');
		$agenda = $this->switchObject('contoh', 'agenda');

        for ($d=1; $d < 21; $d++) { 
			$max_contoh = DokContoh::max('no_dok');
			$crn_contoh = $max_contoh + 1;

			$contoh = DokContoh::create([
				'no_dok' => $crn_contoh,
				'agenda_dok' => $agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $tipe_dok . '-' . $crn_contoh . $agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $this->faker->numberBetween(1,10),
				'lokasi' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
			]);

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
			};

			$contoh->update([
				'object_type' => 'barang',
				'object_id' => $contoh->id
			]);
		}
    }
}
