<?php

namespace Database\Seeders;

use App\Models\DokLap;
use App\Models\RefKategoriPelanggaran;
use App\Models\RefSkemaPenindakan;
use App\Traits\SwitcherTrait;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokLapSeeder extends Seeder
{
	use SwitcherTrait;

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->tipe_dok = 'lap';
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
		$list_jenis_informasi = ['nhi', 'li', 'lainnya'];
		$list_kategori_pelanggaran = RefKategoriPelanggaran::all('id')->toArray();
		$list_skema_penindakan = RefSkemaPenindakan::all('id');
		$list_kode_jabatan = [
			'bd.0503' => 4, 
			'bd.0504' => 5
		];

        for ($i=1; $i < 21; $i++) { 
			$max_pra_penindakan = DokLap::max('no_dok');
			$no_current = $max_pra_penindakan + 1;

			$jenis_sumber = $this->faker->randomElement($list_jenis_informasi);
			if ($jenis_sumber == 'lainnya') {
				$nomor_sumber = $this->faker->numberBetween(1,1000);
			} else {
				$nomor_sumber = strtoupper($jenis_sumber) . '-' . $this->faker->numberBetween(1,1000) . $this->agenda . date("Y");
			}

			$kategori_pelanggaran = $this->faker->randomElement($list_kategori_pelanggaran);

			$layak_penindakan = $this->faker->boolean();
			if ($layak_penindakan) {
				$skema_penindakan = $this->faker->randomElement($list_skema_penindakan);
				$skema_id = $skema_penindakan['id'];
				$ket_skema_penindakan = $this->faker->sentence($nbWords = 20);

				$layak_patroli = null;
				$ket_layak_patroli = null;
			} else {
				$skema_id = null;
				$ket_skema_penindakan = null;

				$layak_patroli = $this->faker->boolean();
				$ket_layak_patroli = $this->faker->sentence($nbWords = 20);
			}

			$jabatan_penerbit = $this->faker->randomElement(['bd.0503', 'bd.0504']);
			$penerbit_id = $list_kode_jabatan[$jabatan_penerbit];

			DokLap::create([
				'no_dok' => $no_current,
				'agenda_dok' => $this->agenda,
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => $this->tipe_surat . '-' . $no_current . $this->agenda . date("Y"),
				'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'jenis_sumber' => $jenis_sumber,
				'nomor_sumber' => $nomor_sumber,
				'tanggal_sumber' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'dugaan_pelanggaran_id' => $kategori_pelanggaran['id'],
				'flag_pelaku' => $this->faker->boolean(),
				'keterangan_pelaku' => $this->faker->sentence($nbWords = 20),
				'flag_pelanggaran' => $this->faker->boolean(),
				'keterangan_pelanggaran' => $this->faker->sentence($nbWords = 20),
				'flag_locus' => $this->faker->boolean(),
				'keterangan_locus' => $this->faker->sentence($nbWords = 20),
				'flag_tempus' => $this->faker->boolean(),
				'keterangan_tempus' => $this->faker->sentence($nbWords = 20),
				'flag_kewenangan' => $this->faker->boolean(),
				'keterangan_kewenangan' => $this->faker->sentence($nbWords = 20),
				'flag_sdm' => $this->faker->boolean(),
				'keterangan_sdm' => $this->faker->sentence($nbWords = 20),
				'flag_sarpras' => $this->faker->boolean(),
				'keterangan_sarpras' => $this->faker->sentence($nbWords = 20),
				'flag_anggaran' => $this->faker->boolean(),
				'keterangan_anggaran' => $this->faker->sentence($nbWords = 20),
				'flag_layak_penindakan' => $layak_penindakan,
				'skema_penindakan_id' => $skema_id,
				'keterangan_skema_penindakan' => $ket_skema_penindakan,
				'flag_layak_patroli' => $layak_patroli,
				'keterangan_patroli' => $ket_layak_patroli,
				'kesimpulan' => $this->faker->sentence($nbWords = 20),
				'kode_jabatan_penerbit' => $jabatan_penerbit,
				'plh_penerbit' => false,
				'penerbit_id' => $penerbit_id,
				'kode_jabatan_atasan' => 'bd.05',
				'plh_atasan' => false,
				'atasan_id' => 3,
				'kode_status' => 200
			]);
		}
    }
}
