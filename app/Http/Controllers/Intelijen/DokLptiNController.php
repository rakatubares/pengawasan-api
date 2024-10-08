<?php

namespace App\Http\Controllers\Intelijen;

use Illuminate\Http\Request;

class DokLptiNController extends DokLptiController
{
    protected $docType = 'lptin';

    /**
     * Prepare data from request to array
     *
     * @param Request $request
     * @return Array
     */
    protected function prepareData(Request $request)
    {
        $tanggal_st = $this->dateFromText($request->tanggal_st);
        $tanggal_mulai = $this->dateFromText($request->tanggal_mulai);
        $tanggal_akhir = $this->dateFromText($request->tanggal_akhir);

        return [
            'nomor_st' => $request->nomor_st,
            'tanggal_st' => $tanggal_st,
            'wilayah' => $request->wilayah,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir,
            'uraian' => $request->uraian,
            'kesimpulan' => $request->kesimpulan,
            'rekomendasi' => $request->rekomendasi,
        ];
    }
}
