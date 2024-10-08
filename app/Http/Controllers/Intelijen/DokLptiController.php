<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokLptiController extends DokController
{
    use ConverterTrait;

    protected $docType = 'lpti';

    protected function additionalSearchQuery($query, $filter)
    {
        $search = '%' . $filter . '%';
        $tableName = $query->getModel()->getTable();

        // Search tugas
        $query = $query->leftJoin('dok_lpti_tugas', function($join) use ($tableName) {
            $join->on('tugasable_id', '=', $tableName.'.id');
            $join->where('tugasable_type', '=', $this->docType);
        });
        $query = $query->orWhere('dok_lpti_tugas.tugas', 'like', $search);

        return $query;
    }

    /**
     * Prepare data from request to array
     *
     * @param Request $request
     * @return Array
     */
    protected function prepareData(Request $request)
    {
        switch ($request->seksi) {
            case 'Intelijen I':
                $agenda = '/KPU.3051/';
                break;

            case 'Intelijen II':
                $agenda = '/KPU.3052/';
                break;
            
            default:
                $agenda = '/KPU.305/';
                break;
        }
        
        $tanggal_st = $this->dateFromText($request->tanggal_st);
        $tanggal_mulai = $this->dateFromText($request->tanggal_mulai);
        $tanggal_akhir = $this->dateFromText($request->tanggal_akhir);
        $tanggal_dok_pabean = $this->dateFromText($request->tanggal_dok_pabean);
        $waktu_pelanggaran = $this->dateFromText($request->waktu_pelanggaran);

        return [
            'agenda_dok' => $agenda,
            'nomor_st' => $request->nomor_st,
            'tanggal_st' => $tanggal_st,
            'wilayah' => $request->wilayah,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir,
            'tempat_pengumpulan' => $request->tempat_pengumpulan,
            'sumber_informasi' => $request->sumber_informasi,
            'metode_pengumpulan' => $request->metode_pengumpulan,
            'ikhtisar_informasi' => $request->ikhtisar_informasi,
            'jenis_dok_pabean' => $request->jenis_dok_pabean,
            'nomor_dok_pabean' => $request->nomor_dok_pabean,
            'tanggal_dok_pabean' => $tanggal_dok_pabean,
            'metode_analisis' => $request->metode_analisis,
            'ikhtisar_analisis' => $request->ikhtisar_analisis,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'modus_pelanggaran' => $request->modus_pelanggaran,
            'tempat_pelanggaran' => $request->tempat_pelanggaran,
            'waktu_pelanggaran' => $waktu_pelanggaran,
            'pelaku_type' => $request->pelaku['type'],
            'pelaku_id' => $request->pelaku['data']['id'],
            'dokumentasi_foto' => $request->dokumentasi_foto,
            'dokumentasi_audio' => $request->dokumentasi_audio,
            'dokumentasi_video' => $request->dokumentasi_video,
            'informasi_lain' => $request->informasi_lain,
            'kesimpulan' => $request->kesimpulan,
            'rekomendasi' => $request->rekomendasi,
        ];
    }

    protected function storing(Request $request)
    {
        $data = parent::storing($request);
        $chain = $this->createChain();
        $data['chain_id'] = $chain->id;

        return $data;
    }

    protected function stored(Request $request)
    {
        $this->createTugas($request->tugas);
        parent::stored($request);
    }

    protected function updated(Request $request)
    {
        $this->updateTugas($request->tugas);
        parent::updated($request);
    }

    private function createTugas($newTugas)
    {
        foreach ($newTugas as $tugas) {
            if ($tugas) {
                $this->doc->tugas()->create([
                    'tugas' => $tugas
                ]);
            }
        }
    }

    private function updateTugas($newTugas)
    {
        $oldTugas = $this->doc->tugas;
        $newTugas = array_filter($newTugas);

        // Update existing tasks or insert new tasks if the new ones more than old ones
        foreach ($newTugas as $k => $tugas) {
            if ($k < sizeof($oldTugas)) {
                $tugasId = $oldTugas[$k]['id'];
                $this->doc->tugas()->find($tugasId)->update([
                    'tugas' => $tugas
                ]);
            } else {
                $this->doc->tugas()->create([
                    'tugas' => $tugas
                ]);
            }
        }

        // Delete exceeding tasks if the old ones more than the new ones
        if (sizeof($newTugas) < sizeof($oldTugas)) {
            for ($i=sizeof($newTugas); $i < sizeof($oldTugas); $i++) {
                $tugasId = $oldTugas[$i]['id'];
                $this->doc->tugas()->find($tugasId)->delete($tugas);
            }
        }
    }
}
