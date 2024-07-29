<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\References\RefKategoriPelanggaran;
use App\Models\References\RefSkemaPenindakan;
use Database\Seeders\DokSeeder;

class DokLapSeeder extends DokSeeder
{
    protected $docCode = 'lap';
    protected $listJenisInformasi = ['nhi', 'li', 'lainnya'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // References
        $list_kategori_pelanggaran = RefKategoriPelanggaran::all('id')->toArray();
        $list_skema_penindakan = RefSkemaPenindakan::all('id');

        // Source
        $available_source_id = [];
        foreach ($this->listJenisInformasi as $jenis) {
            if ($jenis != 'lainnya') {
                $available_source_id[$jenis] = $this->getAvailableDocIds($jenis);
            }
        }

        for ($i=1; $i < 21; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Choose sumber
            $jenisSumber = $this->faker->randomElement($this->listJenisInformasi);
            if ($jenisSumber != 'lainnya') {
                // Get related document data
                $source = $this->chooseDocSource($jenisSumber, $available_source_id[$jenisSumber]);
                $available_source_id[$jenisSumber] = array_diff($available_source_id[$jenisSumber], [$source->id]);

                // Get doc number
                $nomorSumber = $source->no_dok_lengkap;
                $tanggalSumber = $source->tanggal_dokumen;

                // Chain
                $chain = $source->chain;
            } else {
                $nomorSumber = $this->faker->numberBetween(1,1000);
                $tanggalSumber = $this->faker->dateTimeThisYear()->format('Y-m-d');
                
                // Create document chain
                $chain = DocumentsChain::create();
            }

            $kategoriPelanggaran = $this->faker->randomElement($list_kategori_pelanggaran);

            $layakPenindakan = $this->faker->boolean();
            if ($layakPenindakan) {
                $skemaPenindakan = $this->faker->randomElement($list_skema_penindakan);
                $skemaId = $skemaPenindakan['id'];
                $ketSkemaPenindakan = $this->faker->sentence(20);

                $layakPatroli = null;
                $ketLayakPatroli = null;
            } else {
                $skemaId = null;
                $ketSkemaPenindakan = null;

                $layakPatroli = $this->faker->boolean();
                $ketLayakPatroli = $this->faker->sentence(20);
            }

            // Create LAP
            $creator = $this->choosePelaksana();
            
            $lap = new $this->model;
            $lap->no_dok = $this->currentNumber;
            $lap->agenda_dok = $this->agendaDokumen;
            $lap->thn_dok = $this->year;
            $lap->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lap->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lap->chain_id = $chain->id;
            $lap->jenis_sumber = $jenisSumber;
            $lap->nomor_sumber = $nomorSumber;
            $lap->tanggal_sumber = $tanggalSumber;
            $lap->dugaan_pelanggaran_id = $kategoriPelanggaran['id'];
            $lap->flag_pelaku = $this->faker->boolean();
            $lap->keterangan_pelaku = $this->faker->sentence(20);
            $lap->flag_pelanggaran = $this->faker->boolean();
            $lap->keterangan_pelanggaran = $this->faker->sentence(20);
            $lap->flag_locus = $this->faker->boolean();
            $lap->keterangan_locus = $this->faker->sentence(20);
            $lap->flag_tempus = $this->faker->boolean();
            $lap->keterangan_tempus = $this->faker->sentence(20);
            $lap->flag_kewenangan = $this->faker->boolean();
            $lap->keterangan_kewenangan = $this->faker->sentence(20);
            $lap->flag_sdm = $this->faker->boolean();
            $lap->keterangan_sdm = $this->faker->sentence(20);
            $lap->flag_sarpras = $this->faker->boolean();
            $lap->keterangan_sarpras = $this->faker->sentence(20);
            $lap->flag_anggaran = $this->faker->boolean();
            $lap->keterangan_anggaran = $this->faker->sentence(20);
            $lap->flag_layak_penindakan = $layakPenindakan;
            $lap->skema_penindakan_id = $skemaId;
            $lap->keterangan_skema_penindakan = $ketSkemaPenindakan;
            $lap->flag_layak_patroli = $layakPatroli;
            $lap->keterangan_patroli = $ketLayakPatroli;
            $lap->kesimpulan = $this->faker->sentence(20);
            $lap->kode_status = 'terbit';
            $lap->created_by = $creator;
            $lap->updated_by = $creator;
            $lap->saveQuietly();

            // Penerbit
            $this->createPejabat($lap, 'penerbit', 'bd.0503', '111');
            $this->createPejabat($lap, 'atasan', 'bd.05', '555');

            // Document chain
            $chain->update(['latest_document' => $lap->kodeDokumen]);
        }

        $this->createPenomoran();
    }
}
