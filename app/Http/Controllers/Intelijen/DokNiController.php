<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokNiController extends DokController
{
    protected $docType = 'ni';

    public function __construct()
    {
        parent::__construct();
        $doc = new $this->model;
        $this->kodeLkai = $doc->kodeLkai;
        $this->fieldLkaiId = $this->kodeLkai . '_id';
    }

    /*
     |--------------------------------------------------------------------------
     | Data modify functions
     |--------------------------------------------------------------------------
     */

    protected function validateCommonData(Request $request)
    {
        $request->validate([
            'sifat' => 'string',
            'klasifikasi' => 'string',
        ]);
    }

    /**
     * Validate request
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function validateData(Request $request)
    {
        $this->validateCommonData($request);
        $request->validate([
            'lkai_id' => 'nullable|integer',
        ]);
    }

    /**
     * Prepare data from request to array
     *
     * @param Request $request
     * @param String $state
     * @return Array
     */
    protected function prepareData(Request $request)
    {
        return [
            'sifat' => $request->sifat,
            'klasifikasi' => $request->klasifikasi,
            'tujuan' => $request->tujuan,
            'uraian' => $request->uraian,
        ];
    }

    protected function storing(Request $request) {
        $data = parent::storing($request);

        $fieldLkaiId = $this->fieldLkaiId;
        // Get chain ID
        if ($request->$fieldLkaiId == null) {
            // Create new chain
            $chain = $this->createChain();
        } else {
            // Get chain from existing LKAI
            $lkai = $this->attachTo($this->kodeLkai, $request->$fieldLkaiId);
            $chain = $lkai->chain;
        }
        $data['chain_id'] = $chain->id;

        // Save lokasi
        if ($request->tempat_indikasi != null) {
            app(RefLokasiController::class)->save($request->tempat_indikasi);
        }

        return $data;
    }

    protected function updating(Request $request) {
        $data = parent::updating($request);
        $kodeLkai = $this->kodeLkai;
        $fieldLkaiId = $this->fieldLkaiId;
        $existing_lkai = $this->doc->chain->$kodeLkai;
        if ($existing_lkai == null) {
            if ($request->$fieldLkaiId != null) {
                $lkai = $this->attachTo($kodeLkai, $request->$fieldLkaiId);
                $data['chain_id'] = $lkai->chain_id;
            }
        } else {
            if ($request->$fieldLkaiId == null) {
                $this->detachFrom($kodeLkai, $existing_lkai->id);
                $chain = $this->createChain();
                $data['chain_id'] = $chain->id;
            } elseif ($request->$fieldLkaiId != $existing_lkai->id) {
                $this->detachFrom($kodeLkai, $existing_lkai->id);
                $lkai = $this->attachTo($kodeLkai, $request->$fieldLkaiId);
                $data['chain_id'] = $lkai->chain_id;
            }
        }
        return $data;
    }
}
