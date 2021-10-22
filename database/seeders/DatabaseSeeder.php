<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
		$this->call([
			RefStatusSeeder::class,
			SbpHeaderSeeder::class,
			SbpPenindakanSarkutSeeder::class,
			SbpPenindakanBarangSeeder::class,
			SbpBarangDetailSeeder::class,
			SbpPenindakanBangunanSeeder::class,
			SbpPenindakanBadanSeeder::class,
			SegelSeeder::class,
		]);
    }
}
