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
				'penempatan' => 'bd.0503',
				'pejabat' => 'T',
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
				'penempatan' => 'bd.0504',
				'pejabat' => 'T',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'user_id' => 3,
				'username' => 'kabidp2',
				'name' => 'Pejabat P2',
				'nip' => '555',
				'pangkat' => 'IV/e',
				'penempatan' => 'bd.05',
				'pejabat' => 'Y',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'user_id' => 4,
				'username' => 'kasipatops1',
				'name' => 'Pejabat Patops 1',
				'nip' => '111',
				'pangkat' => 'IV/a',
				'penempatan' => 'bd.0503',
				'pejabat' => 'Y',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'user_id' => 5,
				'username' => 'kasipatops2',
				'name' => 'Pejabat Patops 2',
				'nip' => '2222',
				'pangkat' => 'IV/b',
				'penempatan' => 'bd.0504',
				'pejabat' => 'Y',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'user_id' => 6,
				'username' => 'kasipenyidikan',
				'name' => 'Pejabat Penydidikan',
				'nip' => '123123',
				'pangkat' => 'IV/b',
				'penempatan' => 'bd.0505',
				'pejabat' => 'Y',
				'status' => 1,
				'created_at' => $now,
				'updated_at' => $now
			],
		];

		RefUserCache::insert($data);
    }
}
