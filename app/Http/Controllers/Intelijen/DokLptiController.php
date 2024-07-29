<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLptiController extends DokController
{
    protected $docType = 'lpti';

    /**
     * Prepare data from request to array
     *
     * @param Request $request
     * @param String $state
     * @return Array
     */
    protected function prepareData(Request $request, $state='insert')
    {
        $tanggal_dok_pabean = $request->tanggal_dok_pabean != null
            ? date('Y-m-d', strtotime($request->tanggal_dok_pabean)) : null;
        $waktu_pelanggaran = $request->waktu_pelanggaran != null
            ? date('Y-m-d', strtotime($request->waktu_pelanggaran)) : null;

        return [
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

        // Get chain ID
        if ($request->sti['id'] == null) {
            // Create new chain
            $chain = $this->createChain();
        } else {
            // Get chain from existing STI
            $sti = $this->attachTo('sti', $request->sti['id']);
            $chain = $sti->chain;
        }
        $data['chain_id'] = $chain->id;

        return $data;
    }

	protected function updating(Request $request)
    {
        $data = parent::updating($request);
        $this->existing_sti = $this->doc->chain->sti;
        if ($this->existing_sti == null) {
            if ($request->sti['id'] != null) {
                $sti = $this->attachTo('sti', $request->sti['id']);
                $data['chain_id'] = $sti->chain_id;
            }
        } else {
            if ($request->sti['id'] == null) {
                $this->detachFrom('sti', $this->existing_sti->id);
                $chain = $this->createChain();
                $data['chain_id'] = $chain->id;
            } elseif ($request->sti['id'] != $this->existing_sti->id) {
                $this->detachFrom('sti', $this->existing_sti->id);
                $sti = $this->attachTo('sti', $request->sti['id']);
                $data['chain_id'] = $sti->chain_id;
            }
        }
        return $data;
    }
}
