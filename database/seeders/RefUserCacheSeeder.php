<?php

namespace Database\Seeders;

use App\Models\RefUserCache;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefUserCacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('utc')->toDateTimeString();
		$data = [
			[
				'user_id' => 1,
				'username' => 'test',
				'name' => 'TEST',
				'nip' => '123456',
				'pangkat' => 'I/e',
				'penempatan' => 'kpu.03',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'user_id' => 2,
				'username' => 'dummytoo',
				'name' => 'User dummy',
				'nip' => '665544',
				'pangkat' => 'II/f',
				'penempatan' => 'kpu.03',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefUserCache::insert($data);
    }
}
