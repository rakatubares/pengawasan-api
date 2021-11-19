<?php

namespace Database\Seeders;

use App\Models\RefSprint;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RefSprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		for ($i=1; $i <= 10; $i++) { 
			RefSprint::create([
				'nomor_sprint' => 'SPRINT-' . $i . '/KPU.03/BD.05/2021',
				'tanggal_sprint' => $faker->date(),
				'pejabat_id' => 2
			]);
		}
    }
}
