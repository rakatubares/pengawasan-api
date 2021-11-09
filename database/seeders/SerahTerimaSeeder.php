<?php

namespace Database\Seeders;

use App\Models\DetailBarang;
use App\Models\SerahTerima;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerahTerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// DB::beginTransaction();
        $faker = Faker::create();

		// try {
			for ($i=1; $i < 11; $i++) { 
				$detail_sarkut = $faker->boolean();
				$detail_barang = $faker->boolean();
				$detail_dokumen = $faker->boolean();
				$detail_badan = $faker->boolean();
	
				SerahTerima::create([
					'agenda_dok' => '/KPU.03/',
					'thn_dok' => 2021,
					'no_dok_lengkap' => 'BAST-' . $i . '/KPU.03/2021',
					'tgl_dok' => '2021-01-01',
					'no_sprint' => 'SPRINT-01/KPU.03/2021',
					'tgl_sprint' => '2021-01-01',
					'detail_sarkut' => $detail_sarkut,
					'detail_barang' => $detail_barang,
					'detail_dokumen' => $detail_dokumen,
					'detail_badan' => $detail_badan,
					'nama_penerima' => $faker->name(),
					'jns_identitas' => $faker->regexify('[A-Z]{3}'),
					'no_identitas'=> $faker->regexify('[0-9]{15}'),
					'atas_nama_penerima' => $faker->name(),
					'dalam_rangka' => $faker->text(80),
					'pejabat' => $faker->name(),
					'kode_status' => 200,
				]);

				if ($detail_sarkut) {
					$item_count = $faker->numberBetween(1, 10);
	
					for ($c=0; $c < $item_count; $c++) { 
						SerahTerima::find($i)
							->sarkut()
							->create([
								'jenis_sarkut' => $faker->randomElement(['Pesawat', 'Truk', 'Mobil']),
								'no_reg_polisi' => $faker->regexify('[A-Z]{5}'),
							]);
					}
				}
	
				if ($detail_barang) {
					$item_count = $faker->numberBetween(1, 10);
	
					for ($c=0; $c < $item_count; $c++) { 
						$insert_result = SerahTerima::find($i)
							->barang()
							->create([
								'jumlah_kemasan' => $faker->numberBetween(1, 100),
								'satuan_kemasan' => $faker->regexify('[a-z]{2}'),
							]);
	
						$detail_barang_id = $insert_result->id;
	
						DetailBarang::find($detail_barang_id)
							->itemBarang()
							->create([
								'jumlah_barang' => $faker->numberBetween(1, 100),
								'satuan_barang' => $faker->regexify('[a-z]{2}'),
								'uraian_barang' => $faker->text()
							]);
					}
				}

				if ($detail_dokumen) {
					$item_count = $faker->numberBetween(1, 10);
	
					for ($c=0; $c < $item_count; $c++) { 
						SerahTerima::find($i)
							->dokumen()
							->create([
								'jns_dok' => $faker->regexify('[A-Z]{3}'),
								'no_dok' => $faker->regexify('[0-9]{15}'),
								'tgl_dok' => $faker->date()
							]);
					}
				}
	
				if ($detail_badan) {
					$item_count = $faker->numberBetween(1, 10);
	
					for ($c=0; $c < $item_count; $c++) { 
						SerahTerima::find($i)
							->badan()
							->create([
								'nama' => $faker->name(),
								'jns_identitas' => $faker->regexify('[A-Z]{3}'),
								'no_identitas' => $faker->regexify('[0-9]{15}'),
							]);
					}
				}
			}

			
		// 	DB::commit();
		// } catch (\Throwable $th) {
		// 	DB::rollBack();
		// }
		
    }
}
