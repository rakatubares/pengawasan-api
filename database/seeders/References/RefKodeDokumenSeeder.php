<?php

namespace Database\Seeders\References;

use App\Models\References\RefKodeDokumen;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefKodeDokumenSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			// Intelijen
			[
				'kode_dokumen' => 'sti',
				'short_title' => 'STI',
				'title' => 'Surat Tugas Intelijen',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'lpti',
				'short_title' => 'LPTI',
				'title' => 'Laporan Pelaksanaan Tugas Intelijen',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'lppi',
				'short_title' => 'LPPI',
				'title' => 'Lembar Pengumpulan dan Penilaian Informasi',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'lkai',
				'short_title' => 'LKAI',
				'title' => 'Lembar Kerja Analisis Intelijen',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'nhi',
				'short_title' => 'NHI',
				'title' => 'Nota Hasil Intelijen',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'ni',
				'short_title' => 'NI',
				'title' => 'Nota Informasi',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'psa',
				'short_title' => 'PSA',
				'title' => 'Post Seizure Analisis',
				'group' => 'intelijen',
			],
			[
				'kode_dokumen' => 'np',
				'short_title' => 'NP',
				'title' => 'Nota Profil',
				'group' => 'intelijen',
			],

			// Penindakan
			[
				'kode_dokumen' => 'li-1',
				'short_title' => 'LI-1',
				'title' => 'Lembar Informasi',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'lap',
				'short_title' => 'LAP',
				'title' => 'Lembar Analisis Pra Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'npi',
				'short_title' => 'NPI',
				'title' => 'Nota Pengembalian Informasi',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'mpp',
				'short_title' => 'MPP',
				'title' => 'Memo Pelimpahan Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-riksa-badan',
				'short_title' => 'BA Riksa Badan',
				'title' => 'Berita Acara Pemeriksaan Badan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-riksa',
				'short_title' => 'BA Riksa',
				'title' => 'Berita Acara Pemeriksaan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-bawa',
				'short_title' => 'BA Pembawaan Sarkut/Barang',
				'title' => 'Berita Acara Membawa Sarana Pengangkut / Barang',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-contoh',
				'short_title' => 'BA Ambil Contoh',
				'title' => 'Berita Acara Pengambilan Contoh Barang',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-tegah',
				'short_title' => 'BA Penegahan',
				'title' => 'Berita Acara Penegahan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-segel',
				'short_title' => 'BA Penyegelan',
				'title' => 'Berita Acara Penyegelan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-tanda-pengaman',
				'short_title' => 'BA Tanda Pengaman',
				'title' => 'Berita Acara Pelekatan Tanda Pengaman',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-titip',
				'short_title' => 'BA Penitipan',
				'title' => 'Berita Acara Penitipan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-buka-segel',
				'short_title' => 'BA Buka Segel',
				'title' => 'Berita Acara Pembukaan Segel',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'sprint',
				'short_title' => 'SPRINT',
				'title' => 'Surat Perintah',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'sbp',
				'short_title' => 'SBP',
				'title' => 'Surat Bukti Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-tolak-1',
				'short_title' => 'BA Penolakan TTD SBP',
				'title' => 'Berita Acara Penolakan Tanda Tangan Surat Bukti Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-tolak-2',
				'short_title' => 'BA Penolakan TTD BA Penolakan TTD SBP',
				'title' => 'Berita Acara Penolakan Tanda Tangan Terhadap Berita Acara Penolakan Tanda Tangan Surat Bukti Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'lptp',
				'short_title' => 'LPTP',
				'title' => 'Laporan Pelaksanaan Tugas Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'ba-dokumentasi',
				'short_title' => 'BA Dokumentasi',
				'title' => 'Berita Acara Pengambilan Dokumentasi',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'lphp',
				'short_title' => 'LPHP',
				'title' => 'Lembar Penentuan Hasil Penindakan',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'lp',
				'short_title' => 'LP',
				'title' => 'Laporan Pelanggaran',
				'group' => 'penindakan',
			],
			[
				'kode_dokumen' => 'bast',
				'short_title' => 'BAST',
				'title' => 'Berita Acara Serah Terima',
				'group' => 'penindakan',
			],

			// Penyidikan
			[
				'kode_dokumen' => 'lpp',
				'short_title' => 'LPP',
				'title' => 'Lembar Penerimaan Perkara',
				'group' => 'penyidikan',
			],
			[
				'kode_dokumen' => 'lpf',
				'short_title' => 'LPF',
				'title' => 'Lembar Penelitian Formal',
				'group' => 'penyidikan',
			],
			[
				'kode_dokumen' => 'lp-1',
				'short_title' => 'LP-1',
				'title' => 'Laporan Pelanggaran dari Unit/Instansi Lain',
				'group' => 'penyidikan',
			],
			[
				'kode_dokumen' => 'split',
				'short_title' => 'SPLIT',
				'title' => 'Surat Perintah Peneitian',
				'group' => 'penyidikan',
			],
			[
				'kode_dokumen' => 'lhp',
				'short_title' => 'LHP',
				'title' => 'Lembar Hasil Penelitian',
				'group' => 'penyidikan',
			],
			[
				'kode_dokumen' => 'lrp',
				'short_title' => 'LRP',
				'title' => 'Lembar Resume Perkara',
				'group' => 'penyidikan',
			],
			[
				'kode_dokumen' => 'ba-cacah',
				'short_title' => 'BA Pencacahan',
				'title' => 'Berita Acara Pencacahan',
				'group' => 'penyidikan',
			],
			
			// NPP
			[
				'kode_dokumen' => 'lpti-n',
				'short_title' => 'LPTI-N',
				'title' => 'Laporan Pelaksanaan Tugas Intelijen NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'lppi-n',
				'short_title' => 'LPPI-N',
				'title' => 'Lembar Pengumpulan dan Penilaian Informasi NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'lkai-n',
				'short_title' => 'LKAI-N',
				'title' => 'Lembar Kerja Analisis Intelijen NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'nhi-n',
				'short_title' => 'NHI-N',
				'title' => 'Nota Hasil Intelijen NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'ni-n',
				'short_title' => 'NI-N',
				'title' => 'Nota Informasi NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'lap-n',
				'short_title' => 'LAP-N',
				'title' => 'Lembar Analisis Pra Penindakan NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'npi-n',
				'short_title' => 'NPI-N',
				'title' => 'Nota Pengembalian Informasi NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'mpp-n',
				'short_title' => 'MPP-N',
				'title' => 'Memo Pelimpahan Penindakan NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'sbp-n',
				'short_title' => 'SBP-N',
				'title' => 'Surat Bukti Penindakan NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'ba-uji',
				'short_title' => 'BA Pengujian',
				'title' => 'Berita Acara Pengujian Pendahuluan',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'lptp-n',
				'short_title' => 'LPTP-N',
				'title' => 'Laporan Pelaksanaan Tugas Penindakan NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'lphp-n',
				'short_title' => 'LPHP-N',
				'title' => 'Lembar Penentuan Hasil Penindakan NPP',
				'group' => 'npp',
			],
			[
				'kode_dokumen' => 'lp-n',
				'short_title' => 'LP-N',
				'title' => 'Laporan Pelanggaran NPP',
				'group' => 'npp',
			],
		];

		$now = Carbon::now('utc')->toDateTimeString();
		$data = array_map(function($d) use ($now) {
			$d['created_at'] = $now;
			$d['updated_at'] = $now;
			return $d;
		}, $data);

		RefKodeDokumen::insert($data);
	}
}
