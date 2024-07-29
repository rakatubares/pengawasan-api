<?php

namespace Database\Seeders\Penindakan;

use App\Models\References\RefKategoriBarang;
use App\Models\References\RefKemasan;
use App\Models\References\RefSatuan;
use Faker\Factory as Faker;

/**
 * Trait for seeding detail object
 */
trait ObjekPenindakanSeederTrait
{
    public function createSarkut($penindakan)
    {
        $faker = Faker::create();

        $data_penindakan_sarkut = [
            'nama_sarkut' => $faker->company(),
            'jenis_sarkut' => 'Pesawat',
            'nomor_sarkut' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
            'jumlah_kapasitas' => $faker->numberBetween(1, 100),
            'satuan_kapasitas' => $faker->regexify('[A-Z]{2}'),
            'pengemudi_id' => $faker->numberBetween(1, 100),
            'bendera_sarkut' => $faker->countryCode(),
            'registrasi_sarkut' => $faker->regexify('[A-Z]{5}'),
        ];
        $penindakan->sarkut()->create($data_penindakan_sarkut);
    }

    public function createBarang($penindakan)
    {
        $faker = Faker::create();

        $max_kemasan_id = RefKemasan::max('id');
        $max_satuan_id = RefSatuan::max('id');
        $max_kategori_id = RefKategoriBarang::max('id');

        // Create detail penindakan
        $with_dokumen = $faker->boolean();
        $data_penindakan_barang = [
            'jumlah_kemasan' => $faker->numberBetween(1, 100),
            'jenis_kemasan_id' => $faker->numberBetween(1,$max_kemasan_id),
            'nomor_kemasan' => $faker->boolean()
                ? $faker->regexify('[A-Z0-9]{6,10}') : null,
            'jenis_dokumen' => $with_dokumen
                ? $faker->regexify('[A-Z]{3}') : null,
            'nomor_dokumen' => $with_dokumen
                ? $faker->regexify('[0-9]{6}') : null,
            'tanggal_dokumen' => $with_dokumen
                ? $faker->dateTimeThisYear()->format('Y-m-d') : null,
            'pemilik_id' => $faker->numberBetween(1, 100)
        ];
        $penindakan_barang = $penindakan->barang()->create($data_penindakan_barang);

        // Create barang
        $item_count = $faker->numberBetween(1, 10);
        for ($i=0; $i < $item_count; $i++) {
            $with_berat = $faker->boolean();
            $penindakan_barang->barang()
                ->create([
                    'jumlah_barang' => $faker->numberBetween(1, 100),
                    'satuan_id' => $faker->numberBetween(1,$max_satuan_id),
                    'uraian_barang' => $faker->text(),
                    'kategori_id' => $faker->numberBetween(1,$max_kategori_id),
                    'berat' => $with_berat ? $faker->randomFloat(min:0, max:100) : null,
                ]);
        }
    }

    public function createBangunan($penindakan)
    {
        $faker = Faker::create();

        $data_penindakan_bangunan = [
            'alamat' => $faker->address(),
            'no_reg' => $faker->regexify('[0-9]{15}'),
            'pemilik_id' => $faker->numberBetween(1, 100),
        ];
        $penindakan->bangunan()->create($data_penindakan_bangunan);
    }

    public function createBadan($penindakan)
    {
        $faker = Faker::create();
        
        $with_sarkut = $faker->boolean();
        $with_dokumen = $faker->boolean();
        $data_penindakan_badan = [
            'entitas_id' => $faker->numberBetween(1, 100),
            'asal' => $faker->address(),
            'tujuan' => $faker->address(),
            'pendamping_id' => $faker->numberBetween(1, 100),
            'nama_sarkut' => $with_sarkut ? $faker->company() : null,
            'jenis_sarkut' => $with_sarkut ? 'pesawat' : null,
            'nomor_sarkut' => $with_sarkut ? $faker->regexify('[A-Z]{2}[0-9]{3}') : null,
            'pengemudi_id' => $with_sarkut ? $faker->numberBetween(1, 100) : null,
            'bendera_sarkut' => $with_sarkut ? $faker->countryCode() : null,
            'registrasi_sarkut' => $with_sarkut ? $faker->regexify('[A-Z]{5}') : null,
            'jenis_dokumen' => $with_dokumen
                ? $faker->regexify('[A-Z]{3}') : null,
            'nomor_dokumen' => $with_dokumen
                ? $faker->regexify('[0-9]{6}') : null,
            'tanggal_dokumen' => $with_dokumen
                ? $faker->dateTimeThisYear()->format('Y-m-d') : null,
            'uraian_pemeriksaan' => $faker->sentence(20),
            'hasil_pemeriksaan' => $faker->sentence(20),
        ];
        $penindakan->badan()->create($data_penindakan_badan);
    }
}
