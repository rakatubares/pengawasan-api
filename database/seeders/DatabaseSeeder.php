<?php

namespace Database\Seeders;

use Database\Seeders\Intelijen\DokLkaiNSeeder;
use Database\Seeders\Intelijen\DokLkaiSeeder;
use Database\Seeders\Intelijen\DokLppiNSeeder;
use Database\Seeders\Intelijen\DokLppiSeeder;
use Database\Seeders\Intelijen\DokNhiNSeeder;
use Database\Seeders\Intelijen\DokNhiSeeder;
use Database\Seeders\Intelijen\DokNiNSeeder;
use Database\Seeders\Intelijen\DokNiSeeder;
use Database\Seeders\Penindakan\DokBukaPengamanSeeder;
use Database\Seeders\Penindakan\DokBukaSegelSeeder;
use Database\Seeders\Penindakan\DokLapSeeder;
use Database\Seeders\Penindakan\DokLiSeeder;
use Database\Seeders\Penindakan\DokLphpSeeder;
use Database\Seeders\Penindakan\DokLpSeeder;
use Database\Seeders\Penindakan\DokPengamanSeeder;
use Database\Seeders\Penindakan\DokSbpSeeder;
use Database\Seeders\References\RefBandaraSeeder;
use Database\Seeders\References\RefJabatanSeeder;
use Database\Seeders\References\RefKantorBCSeeder;
use Database\Seeders\References\RefKategoriBarangSeeder;
use Database\Seeders\References\RefKategoriPelanggaranSeeder;
use Database\Seeders\References\RefKemasanSeeder;
use Database\Seeders\References\RefKepercayaanSumberSeeder;
use Database\Seeders\References\RefKodeDokumenSeeder;
use Database\Seeders\References\RefLokasiSeeder;
use Database\Seeders\References\RefNegaraSeeder;
use Database\Seeders\References\RefSatuanSeeder;
use Database\Seeders\References\RefSkemaPenindakanSeeder;
use Database\Seeders\References\RefStatusSeeder;
use Database\Seeders\References\RefTipeKantorSeeder;
use Database\Seeders\References\RefValiditasInformasiSeeder;
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
			RefUserCacheSeeder::class,
			EntitasOrangSeeder::class,
			EntitasBadanHukumSeeder::class,
			SprintSeeder::class,
			
			// Intelijen
			DokLppiSeeder::class,
			DokLkaiSeeder::class,
			DokNhiSeeder::class,
			DokNiSeeder::class,

			DokLppiNSeeder::class,
			DokLkaiNSeeder::class,
			DokNhiNSeeder::class,
			DokNiNSeeder::class,

			// Penindakan
			DokLiSeeder::class,
			DokLapSeeder::class,
			DokSbpSeeder::class,
			DokLphpSeeder::class,
			DokLpSeeder::class,
			DokBukaSegelSeeder::class,
			DokPengamanSeeder::class,
			DokBukaPengamanSeeder::class,
			// DokRiksaSeeder::class,
			// DokRiksaBadanSeeder::class,
			// DokSegelSeeder::class,
			// DokTitipSeeder::class,
			// DokBastSeeder::class,
			// DokContohSeeder::class,
			// DokReeksporSeeder::class,
			// DokLppiNSeeder::class,
			// DokLkaiNSeeder::class,
			// DokNhiNSeeder::class,
			// DokLapNSeeder::class,
			// DokSbpNSeeder::class,
			// DokLphpNSeeder::class,
			// DokLpNSeeder::class,
		]);
	}
}
