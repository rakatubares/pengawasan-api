<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\DokRiksa;
use App\Models\Penindakan\DokRiksaBadan;
use App\Models\Penindakan\DokSegel;
use App\Models\Penindakan\DokTegah;
use App\Models\Penindakan\DokTolakSbp1;
use App\Models\Penindakan\DokTolakSbp2;
use App\Models\Penindakan\Penindakan;
use App\Models\References\RefKategoriPelanggaran;
use App\Models\References\RefLokasi;
use Database\Seeders\DokSeeder;
use Illuminate\Database\Eloquent\Relations\Relation;

class DokSbpSeeder extends DokSeeder
{
    use ObjekPenindakanSeederTrait;

    protected $docCode = 'sbp';

    public function __construct()
    {
        parent::__construct();
        $this->kodeNhi = $this->doc->kodeNhi;
        $this->kodeLap = $this->doc->kodeLap;
        $this->kodeLptp = $this->doc->kodeLptp;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get lap ids
        $this->available_lap_id = $this->getAvailableLapIds();

        // References
        $this->lokasi = RefLokasi::select('lokasi')->get();
        $this->list_kategori_pelanggaran = RefKategoriPelanggaran::select('id')->get();

        for ($i=1; $i < 51; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Randomize LAP
            $fromLap = false;
            if (sizeof($this->available_lap_id)) {
                $fromLap = $this->faker->boolean();
            }

            // Get data lap
            $this->chain = $this->chooseLap($fromLap);

            // Create Penindakan
            $this->penindakan = $this->createPenindakan($fromLap);

            // Create SBP
            $this->creator = $this->choosePelaksana();
            $this->tanggal = $this->faker->dateTimeThisYear()->format('Y-m-d');

            $sbp = new $this->model;
            $sbp->no_dok = $this->currentNumber;
            $sbp->agenda_dok = $this->agendaDokumen;
            $sbp->thn_dok = $this->year;
            $sbp->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $sbp->tanggal_dokumen = $this->tanggal;
            $sbp->chain_id = $this->chain->id;
            $sbp->kode_status = 'terbit';
            $sbp->status_tindak_lanjut = true;
            $sbp->created_by = $this->creator;
            $sbp->updated_by = $this->creator;
            $sbp->saveQuietly();

            // Create LPTP
            $lptp = $this->createLptp();

            // Objek penindakan
            $this->createObject();

            // BA Penindakan
            $this->createBAPenindakan();

            // BA Penolakan
            $this->createPenolakan($sbp);

            // Document chain
            $this->chain->update(['latest_document' => $lptp->kodeDokumen]);
        }

        $this->createPenomoran();
    }

    protected function getAvailableLapIds()
    {
        $modelLap = Relation::getMorphedModel($this->kodeLap);
        $lapIds = $modelLap::select('id')
            ->where(['flag_layak_penindakan' => true])
            ->get()
            ->toArray();

        return array_map(function($d) {return $d['id'];}, $lapIds);
    }

    protected function chooseLap($fromLap)
    {
        $kodeNhi = $this->kodeNhi;
        if ($fromLap) {
            $lap = $this->chooseDocSource($this->kodeLap, $this->available_lap_id);
            $this->available_lap_id = array_diff($this->available_lap_id, [$lap->id]);
            $chain = $lap->chain;

            // Check NHI
            if ($chain->$kodeNhi) { $chain->$kodeNhi->followedUp('status_sbp'); }
        } else {
            $chain = DocumentsChain::create();
        }

        return $chain;
    }

    protected function createPenindakan($fromLap)
    {
        $kodeNhi = $this->kodeNhi;
        $kodeLap = $this->kodeLap;

        if ($fromLap) {
            if ($this->chain->$kodeNhi) {
                $lokasi_penindakan = $this->chain->$kodeNhi->tempatIndikasi;
            } else {
                $lokasi_penindakan = $this->faker->randomElement($this->lokasi)->lokasi;
            }
            $kategori_pelanggaran_id = $this->chain->$kodeLap->dugaan_pelanggaran_id;
        } else {
            $lokasi_penindakan = $this->faker->randomElement($this->lokasi)->lokasi;
            $kategori_pelanggaran_id = $this->faker->randomElement($this->list_kategori_pelanggaran)->id;
        }

        $penindakan = new Penindakan();
        $penindakan->sprint_id = $this->faker->numberBetween(1,10);
        $penindakan->chain_id = $this->chain->id;
        $penindakan->tanggal_mulai_penindakan = $this->faker->dateTimeThisYear()->format('Y-m-d');
        $penindakan->waktu_mulai_penindakan = $this->faker->time();
        $penindakan->tanggal_selesai_penindakan = $this->faker->dateTimeThisYear()->format('Y-m-d');
        $penindakan->waktu_selesai_penindakan = $this->faker->time();
        $penindakan->lokasi_penindakan = $lokasi_penindakan;
        $penindakan->kategori_penindakan_id = $kategori_pelanggaran_id;
        $penindakan->uraian_penindakan = $this->faker->sentence(20);
        $penindakan->alasan_penindakan = $this->faker->sentence(20);
        $penindakan->jenis_pelanggaran = $this->faker->randomElement(['Kepabeanan', 'Cukai']);
        $penindakan->hal_terjadi = $this->faker->text();
        $penindakan->saksi_id = $this->faker->numberBetween(1,100);
        $penindakan->save();

        // Petugas
        $availableNip = $this->nipPelaksana;
        $nip = $this->createPetugas($penindakan, 'petugas1', $availableNip);

        $with_petugas2 = $this->faker->boolean();
        if ($with_petugas2) {
            $availableNip = array_diff($availableNip, [$nip]);
            $this->createPetugas($penindakan, 'petugas2', $availableNip);
        }

        return $penindakan;
    }

    protected function createLptp()
    {
        $modelLptp = Relation::getMorphedModel($this->kodeLptp);
        $maxLptp = $modelLptp::max('no_dok');
        $crnLptp = $maxLptp + 1;

        $lptp = new $modelLptp;
        $lptp->no_dok = $crnLptp;
        $lptp->agenda_dok = $lptp->agendaDokumen;
        $lptp->thn_dok = $this->year;
        $lptp->no_dok_lengkap = "{$lptp->tipeDokumen}-{$crnLptp}{$lptp->agendaDokumen}{$this->year}";
        $lptp->tanggal_dokumen = $this->tanggal;
        $lptp->chain_id = $this->chain->id;
        $lptp->catatan = $this->faker->sentence(10);
        $lptp->kode_status = 'terbit';
        $lptp->created_by = $this->creator;
        $lptp->updated_by = $this->creator;
        $lptp->saveQuietly();

        // Atasan
        $this->createPejabat($lptp, 'atasan', 'bd.0503', '111');

        // Create tembusan
        $this->createTembusan($lptp);

        // Create penomoran
        $this->createPenomoran($lptp->tipeDokumen, $lptp->agendaDokumen, $crnLptp);

        return $lptp;
    }

    protected function createObject()
    {
        // Sarkut
        $this->withSarkut = $this->faker->boolean();
        if ($this->withSarkut) {
            $this->createSarkut($this->penindakan);
        }

        // Barang
        $this->withBarang = $this->faker->boolean();
        if ($this->withBarang) {
            $this->createBarang($this->penindakan);
        }

        // Bangunan
        $this->withBangunan = $this->faker->boolean();
        if ($this->withBangunan) {
            $this->createBangunan($this->penindakan);
        }

        // Badan
        $this->withBadan = $this->faker->boolean();
        if ($this->withBadan) {
            $this->createBadan($this->penindakan);
        }
    }

    protected function createBAPenindakan()
    {
        // BA Pemeriksaan Badan
        if ($this->withBadan) {
            $withRiksaBadan = $this->faker->boolean();
            if ($withRiksaBadan) {
                $this->createRiksaBadan();
            }
        }
        
        // BA Pemeriksaan
        if ($this->withSarkut || $this->withBarang || $this->withBangunan) {
            $withRiksa = $this->faker->boolean();
            if ($withRiksa) {
                $this->createRiksa();
            }
        }

        // BA Penegahan
        if ($this->withSarkut || $this->withBarang) {
            $withTegah = $this->faker->boolean();
            if ($withTegah) {
                $this->createTegah();
            }
        }

        // BA Penyegelan
        if ($this->withSarkut || $this->withBarang || $this->withBangunan) {
            $withSegel = $this->faker->boolean();
            if ($withSegel) {
                $this->createSegel();
            }
        }
    }

    protected function createRiksaBadan()
    {
        // Get max riksa badan number
        $maxRiksaBadan = DokRiksaBadan::max('no_dok');
        $crnRiksaBadan = $maxRiksaBadan + 1;

        // Create BA Riksa Badan
        $riksaBadan = new DokRiksaBadan();
        $riksaBadan->no_dok = $crnRiksaBadan;
        $riksaBadan->agenda_dok = $riksaBadan->agendaDokumen;
        $riksaBadan->thn_dok = $this->year;
        $riksaBadan->no_dok_lengkap = "{$riksaBadan->tipeDokumen}-{$crnRiksaBadan}{$riksaBadan->agendaDokumen}{$this->year}";
        $riksaBadan->tanggal_dokumen = $this->tanggal;
        $riksaBadan->chain_id = $this->chain->id;
        $riksaBadan->kode_status = 'terbit';
        $riksaBadan->created_by = $this->creator;
        $riksaBadan->updated_by = $this->creator;
        $riksaBadan->saveQuietly();

        // Create penomoran
        $this->createPenomoran($riksaBadan->tipeDokumen, $riksaBadan->agendaDokumen, $crnRiksaBadan);
    }

    protected function createRiksa()
    {
        // Get max riksa number
        $maxRiksa = DokRiksa::max('no_dok');
        $crnRiksa = $maxRiksa + 1;

        // Create BA Riksa
        $riksa = new DokRiksa();
        $riksa->no_dok = $crnRiksa;
        $riksa->agenda_dok = $riksa->agendaDokumen;
        $riksa->thn_dok = $this->year;
        $riksa->no_dok_lengkap = "{$riksa->tipeDokumen}-{$crnRiksa}{$riksa->agendaDokumen}{$this->year}";
        $riksa->tanggal_dokumen = $this->tanggal;
        $riksa->chain_id = $this->chain->id;
        $riksa->kode_status = 'terbit';
        $riksa->created_by = $this->creator;
        $riksa->updated_by = $this->creator;
        $riksa->saveQuietly();

        // Create penomoran
        $this->createPenomoran($riksa->tipeDokumen, $riksa->agendaDokumen, $crnRiksa);
    }

    protected function createTegah()
    {
        // Get max tegah number
        $maxTegah = DokTegah::max('no_dok');
        $crnTegah = $maxTegah + 1;

        // Create BA Penegahan
        $tegah = new DokTegah();
        $tegah->no_dok = $crnTegah;
        $tegah->agenda_dok = $tegah->agendaDokumen;
        $tegah->thn_dok = $this->year;
        $tegah->no_dok_lengkap = "{$tegah->tipeDokumen}-{$crnTegah}{$tegah->agendaDokumen}{$this->year}";
        $tegah->tanggal_dokumen = $this->tanggal;
        $tegah->chain_id = $this->chain->id;
        $tegah->kode_status = 'terbit';
        $tegah->created_by = $this->creator;
        $tegah->updated_by = $this->creator;
        $tegah->saveQuietly();

        // Create penomoran
        $this->createPenomoran($tegah->tipeDokumen, $tegah->agendaDokumen, $crnTegah);
    }

    protected function createSegel()
    {
        // Get max tegah number
        $maxSegel = DokSegel::max('no_dok');
        $crnSegel = $maxSegel + 1;

        // Create BA Penegahan
        $segel = new DokSegel();
        $segel->no_dok = $crnSegel;
        $segel->agenda_dok = $segel->agendaDokumen;
        $segel->thn_dok = $this->year;
        $segel->no_dok_lengkap = "{$segel->tipeDokumen}-{$crnSegel}{$segel->agendaDokumen}{$this->year}";
        $segel->tanggal_dokumen = $this->tanggal;
        $segel->chain_id = $this->chain->id;
        $segel->jenis_segel = $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']);
        $segel->jumlah_segel = $this->faker->numberBetween(1,5);
        $segel->satuan_segel = $this->faker->randomElement(['lembar', 'buah']);
        $segel->nomor_segel = "{$segel->tipe_dokumen}-{$crnSegel}{$segel->agendaDokumen}{$this->year}";
        $segel->tempat_segel = $this->faker->word();
        $segel->kode_status = 'terbit';
        $segel->created_by = $this->creator;
        $segel->updated_by = $this->creator;
        $segel->saveQuietly();

        // Create penomoran
        $this->createPenomoran($segel->tipeDokumen, $segel->agendaDokumen, $crnSegel);
    }

    protected function createPenolakan($sbp)
    {
        $isTolak1 = $this->faker->boolean();
        if ($isTolak1) {
            // Create tolak 1
            $maxTolak1 = DokTolakSbp1::max('no_dok');
            $crnTolak1 = $maxTolak1 + 1;

            $tolak1 = new DokTolakSbp1();
            $tolak1->no_dok = $crnTolak1;
            $tolak1->agenda_dok = $tolak1->agendaDokumen;
            $tolak1->thn_dok = $this->year;
            $tolak1->no_dok_lengkap = "{$tolak1->tipeDokumen}-{$crnTolak1}{$tolak1->agendaDokumen}{$this->year}";
            $tolak1->tanggal_dokumen = $this->tanggal;
            $tolak1->chain_id = $this->chain->id;
            $tolak1->parent_type = $sbp->kodeDokumen;
            $tolak1->parent_id = $sbp->id;
            $tolak1->alasan = $this->faker->text();
            $tolak1->kode_status = 'terbit';
            $tolak1->created_by = $this->creator;
            $tolak1->updated_by = $this->creator;
            $tolak1->saveQuietly();

            // Create penomoran
            $this->createPenomoran($tolak1->tipeDokumen, $tolak1->agendaDokumen, $crnTolak1);

            // Update flag tolak sbp
            $sbp->update(['status_tolak' => true]);

            // Penolakan 2
            $isTolak2 = $this->faker->boolean();
            if ($isTolak2) {
                // Create tolak 2
                $maxTolak2 = DokTolakSbp2::max('no_dok');
                $crnTolak2 = $maxTolak2 + 1;

                $tolak2 = new DokTolakSbp2();
                $tolak2->no_dok = $crnTolak2;
                $tolak2->agenda_dok = $tolak2->agendaDokumen;
                $tolak2->thn_dok = $this->year;
                $tolak2->no_dok_lengkap = "{$tolak2->tipeDokumen}-{$crnTolak2}{$tolak2->agendaDokumen}{$this->year}";
                $tolak2->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
                $tolak2->chain_id = $this->chain->id;
                $tolak2->tolak1_id = $tolak1->id;
                $tolak2->alasan = $this->faker->text();
                $tolak2->saksi_id = $this->faker->numberBetween(1,100);
                $tolak2->kode_status = 'terbit';
                $tolak2->created_by = $this->creator;
                $tolak2->updated_by = $this->creator;
                $tolak2->saveQuietly();

                // Create penomoran
                $this->createPenomoran($tolak2->tipeDokumen, $tolak2->agendaDokumen, $crnTolak2);

                // Update flag tolak ba tolak 1
                $tolak1->update(['status_tolak' => true]);
            }
        }
    }
}
