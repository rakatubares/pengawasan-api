<?php

namespace Database\Seeders\Intelijen;

use App\Models\DocumentsChain;
use App\Models\References\RefKepercayaanSumber;
use App\Models\References\RefValiditasInformasi;
use Database\Seeders\DokSeeder;

class DokLppiSeeder extends DokSeeder
{
    protected $docCode = 'lppi';
	protected $agendaLpt = '/KPU.3051/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // References
        $ref_kepercayaan = RefKepercayaanSumber::all()->all();
        $this->list_kode_kepercayaan = array_map(function ($k){ return $k->klasifikasi; }, $ref_kepercayaan);
        $ref_validitas = RefValiditasInformasi::all()->all();
        $this->list_kode_validitas = array_map(function ($v){ return $v->klasifikasi; }, $ref_validitas);

        // Get available LPTI ids
        $this->available_lpti_id = $this->getAvailableDocIds('lpti', $this->agendaLpt);

        for ($d=1; $d < 51; $d++) {
            // Reset chain
            $this->chain = null;
            
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Sumber info
            $sourceInfo = [];
            $sourceInfo['internal'] = $this->createSourceInfo('internal');
            $sourceInfo['eksternal'] = $this->createSourceInfo('eksternal');

            // Create document chain
            $this->chain = $this->chain ?? DocumentsChain::create();

            // Insert data
            $creator = $this->choosePelaksana();

            $lppi = new $this->model;
            $lppi->no_dok = $this->currentNumber;
            $lppi->agenda_dok = $this->agendaDokumen;
            $lppi->thn_dok = $this->year;
            $lppi->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lppi->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lppi->chain_id = $this->chain->id;
            $lppi->flag_info_internal = $sourceInfo['internal']['flag'];
            $lppi->media_info_internal = $sourceInfo['internal']['media'];
            $lppi->tgl_terima_info_internal = $sourceInfo['internal']['tgl_terima'];
            $lppi->no_dok_info_internal = $sourceInfo['internal']['no_dok'];
            $lppi->tgl_dok_info_internal = $sourceInfo['internal']['tgl_dok'];
            $lppi->flag_info_eksternal = $sourceInfo['eksternal']['flag'];
            $lppi->media_info_eksternal = $sourceInfo['eksternal']['media'];
            $lppi->tgl_terima_info_eksternal = $sourceInfo['eksternal']['tgl_terima'];
            $lppi->no_dok_info_eksternal = $sourceInfo['eksternal']['no_dok'];
            $lppi->tgl_dok_info_eksternal = $sourceInfo['eksternal']['tgl_dok'];
            $lppi->kesimpulan = $this->faker->text();
            $lppi->tanggal_disposisi = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lppi->flag_analisis = $this->faker->boolean();
            $lppi->flag_arsip = $this->faker->boolean();
            $lppi->catatan = $this->faker->text();
            $lppi->kode_status = 'terbit';
            $lppi->created_by = $creator;
            $lppi->updated_by = $creator;
            $lppi->saveQuietly();

            // Create ikhtisar informasi
            $this->createInformasi($lppi);

            // Petugas
            $this->createPetugas($lppi, 'penerima_informasi');
            $this->createPetugas($lppi, 'penilai_informasi');
            $this->createPetugas($lppi, 'penerima_disposisi');
            $this->createPejabat($lppi, 'pejabat', 'bd.0501', '147');
            
            // Update Chain
            $this->chain->update(['latest_document' => $lppi->kodeDokumen]);
        }

        $this->createPenomoran();
    }

    protected function createSourceInfo($type)
    {
        $source = [
            'flag' => false,
            'media' => null,
            'tgl_terima' => null,
            'no_dok' => null,
            'tgl_dok' => null,
        ];

        if ($type == 'internal') {
            $mediaOptions = ['kajian', 'sms center', 'Nota Informasi', 'LPTI', 'surat', 'nota dinas'];
        } else {
            $mediaOptions = ['informasi dari institusi lain', 'pengaduan masyarakat', 'surat informan'];
        }

        $flag = $this->faker->boolean();
        if ($flag) {
            $media = $this->faker->randomElement($mediaOptions);
            $source['flag'] = true;
            $source['media'] = $media;
            $source['tgl_terima'] = $this->faker->dateTimeThisYear()->format('Y-m-d');
            if ($media != 'LPTI') {
                $source['no_dok'] = $this->faker->regexify('[A-Za-z0-9]{10}');
                $source['tgl_dok'] = $this->faker->dateTimeThisYear()->format('Y-m-d');
            } else {
                $lpti = $this->chooseLpti();
                $source['no_dok'] = $lpti->no_dok_lengkap;
                $source['tgl_dok'] = $lpti->tanggal_dokumen;
                $this->chain = $lpti->chain;
            }
        }

        return $source;
    }

    protected function chooseLpti()
    {
        $lpti = $this->chooseDocSource('lpti', $this->available_lpti_id);
        $this->available_lpti_id = array_diff($this->available_lpti_id, [$lpti->id]);
        return $lpti;
    }

    protected function createInformasi($lppi)
    {
        $informasi_count = $this->faker->numberBetween(1, 5);
        for ($i=0; $i < $informasi_count; $i++) {
            $lppi->informasi()
                ->create([
                    'informasi' => $this->faker->text(),
                    'kode_kepercayaan' => $this->faker->randomElement($this->list_kode_kepercayaan),
                    'kode_validitas' => $this->faker->randomElement($this->list_kode_validitas),
                ]);
        }
    }
}
