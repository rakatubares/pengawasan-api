<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RefKodeDokumenSeeder::class,
            RefStatusSeeder::class,
            RefNegaraSeeder::class,
            RefBandaraSeeder::class,
            RefSatuanSeeder::class,
            RefKemasanSeeder::class,
            RefKategoriBarangSeeder::class,
            RefKategoriPelanggaranSeeder::class,
            RefSkemaPenindakanSeeder::class,
            RefTipeKantorSeeder::class,
            RefKantorBCSeeder::class,
            RefLokasiSeeder::class,
            RefKepercayaanSumberSeeder::class,
            RefValiditasInformasiSeeder::class,
            RefJabatanSeeder::class,
        ]);
    }
}
