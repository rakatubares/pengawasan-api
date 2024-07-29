<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\Penindakan;
use Database\Seeders\DokSeeder;

class DokBukaSegelSeeder extends DokSeeder
{
    use ObjekPenindakanSeederTrait;

    protected $docCode = 'buka_segel';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get available BA Segel ids
        $this->available_segel_id = $this->getAvailableDocIds('segel');
            
        for ($i=1; $i < 16; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();
                
            // Create Buka Segel
            $creator = $this->choosePelaksana();

            $buka_segel = new $this->model;
            $buka_segel->no_dok = $this->currentNumber;
            $buka_segel->agenda_dok = $this->agendaDokumen;
            $buka_segel->thn_dok = $this->year;
            $buka_segel->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $buka_segel->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $buka_segel->sprint_id = $this->faker->numberBetween(1,10);
            $buka_segel->tanggal_buka_segel = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $buka_segel->saksi_id = $this->faker->numberBetween(1,100);
            $buka_segel->kode_status = 'terbit';
            $buka_segel->created_by = $creator;
            $buka_segel->updated_by = $creator;

            $flag_segel = $this->faker->boolean();
            if ($flag_segel) {
                // Get data segel
                $segel = $this->chooseSegel();
                $chain = $segel->chain;

                // Set Segel data
                $buka_segel->chain_id = $chain->id;
                $buka_segel->asal_segel = 'segel';
                $buka_segel->jenis_segel = $segel->jenis_segel;
                $buka_segel->jumlah_segel = $segel->jumlah_segel;
                $buka_segel->satuan_segel = $segel->satuan_segel;
                $buka_segel->tempat_segel = $segel->tempat_segel;
                $buka_segel->nomor_segel = $segel->nomor_segel;
                $buka_segel->tanggal_segel = $segel->chain->penindakan->tanggal_selesai_penindakan->format('Y-m-d');
            } else {
                // Create chain
                $chain = DocumentsChain::create();
                $chain->update(['latest_document' => $buka_segel->kodeDokumen]);

                // Create penindakan
                $penindakan = new Penindakan();
                $penindakan->chain_id = $chain->id;
                $penindakan->save();

                // Set Segel data
                $buka_segel->chain_id = $chain->id;
                $buka_segel->asal_segel = 'input';
                $buka_segel->jenis_segel = $this->faker->randomElement(['Kertas', 'Timah', 'Lainnya']);
                $buka_segel->jumlah_segel = $this->faker->numberBetween(1,5);
                $buka_segel->satuan_segel = $this->faker->randomElement(['lembar', 'buah']);
                $buka_segel->tempat_segel = $this->faker->word();
                $buka_segel->nomor_segel = 'BA-' . $this->faker->numberBetween(1,100) . '/SEGEL/BC/' . date("Y");
                $buka_segel->tanggal_segel = $this->faker->dateTimeThisYear()->format('Y-m-d');

                // Objek penindakan
                $withSarkut = $this->faker->boolean();
                if ($withSarkut) {
                    $this->createSarkut($penindakan);
                }

                // Barang
                $withBarang = $this->faker->boolean();
                if ($withBarang) {
                    $this->createBarang($penindakan);
                }

                // Bangunan
                $withBangunan = $this->faker->boolean();
                if ($withBangunan) {
                    $this->createBangunan($penindakan);
                }
            }
            $buka_segel->saveQuietly();

            // Petugas
            $availableNip = $this->nipPelaksana;
            $nip = $this->createPetugas($buka_segel, 'petugas1', $availableNip);

            $with_petugas2 = $this->faker->boolean();
            if ($with_petugas2) {
                $availableNip = array_diff($availableNip, [$nip]);
                $this->createPetugas($buka_segel, 'petugas2', $availableNip);
            }
        }

        $this->createPenomoran();
    }

    protected function chooseSegel()
    {
        $segel = $this->chooseDocSource('segel', $this->available_segel_id, 'status_buka');
        $this->available_segel_id = array_diff($this->available_segel_id, [$segel->id]);
        return $segel;
    }
}
