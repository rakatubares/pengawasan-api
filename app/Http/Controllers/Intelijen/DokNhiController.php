<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Http\Controllers\References\RefLokasiController;
use App\Traits\ConverterTrait;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class DokNhiController extends DokController
{
    use ConverterTrait;

    protected $docType = 'nhi';
    
    public function __construct()
    {
        parent::__construct();
        $doc = new $this->model;
        $this->kodeLkai = $doc->kodeLkai;
        $this->fieldLkaiId = $this->kodeLkai . '_id';
    }

    protected function additionalSearchQuery($query, $filter)
    {
        $search = '%' . $filter . '%';

        $tableName = $query->getModel()->getTable();
        $colDetailId = $tableName.'.detail_id';
        $colDetailType = $tableName.'.detail_type';

        ///// Search exim /////
        $query = $query->leftJoin('dok_nhi_exim', function($join) use ($colDetailId, $colDetailType) {
            $join->on($colDetailId, '=', 'dok_nhi_exim.id');
            $join->where($colDetailType, '=', 'nhi-exim');
        });
        $query = $query->orWhere('dok_nhi_exim.nomor_dok', 'like', $search);
        $query = $query->orWhere('dok_nhi_exim.nomor_awb', 'like', $search);

        // Entitas exim orang
        $query = $query->leftJoin('entitas_orang AS o1', function($entitas) {
            $entitas->on('dok_nhi_exim.entitas_id', '=', 'o1.id');
            $entitas->where('dok_nhi_exim.entitas_type', '=', 'entitas-orang');
        });
        $query = $query->orWhere('o1.nama', 'like', $search);

        // Entitas exim badan hukum
        $query = $query->leftJoin('entitas_badan_hukum AS b1', function($entitas) {
            $entitas->on('dok_nhi_exim.entitas_id', '=', 'b1.id');
            $entitas->where('dok_nhi_exim.entitas_type', '=', 'entitas-badan-hukum');
        });
        $query = $query->orWhere('b1.nama', 'like', $search);

        ///// Search BKC /////
        $query = $query->leftJoin('dok_nhi_bkc', function($join) use ($colDetailId, $colDetailType) {
            $join->on($colDetailId, '=', 'dok_nhi_bkc.id');
            $join->where($colDetailType, '=', 'nhi-bkc');
        });
        $query = $query->orWhere('dok_nhi_bkc.penyalur', 'like', $search);

        ///// Search Tertentu /////
        $query = $query->leftJoin('dok_nhi_tertentu', function($join) use ($colDetailId, $colDetailType) {
            $join->on($colDetailId, '=', 'dok_nhi_tertentu.id');
            $join->where($colDetailType, '=', 'nhi-tertentu');
        });
        $query = $query->orWhere('dok_nhi_tertentu.nomor_dok', 'like', $search);
        $query = $query->orWhere('dok_nhi_tertentu.nomor_awb', 'like', $search);

        // Entitas tertentu orang
        $query = $query->leftJoin('entitas_orang AS o2', function($entitas) {
            $entitas->on('dok_nhi_tertentu.entitas_id', '=', 'o2.id');
            $entitas->where('dok_nhi_tertentu.entitas_type', '=', 'entitas-orang');
        });
        $query = $query->orWhere('o2.nama', 'like', $search);

        // Entitas tertentu badan hukum
        $query = $query->leftJoin('entitas_badan_hukum AS b2', function($entitas) {
            $entitas->on('dok_nhi_tertentu.entitas_id', '=', 'b2.id');
            $entitas->where('dok_nhi_tertentu.entitas_type', '=', 'entitas-badan-hukum');
        });
        $query = $query->orWhere('b2.nama', 'like', $search);

        ///// Search Barang /////
        $query = $query->leftJoin('barang', function($join) use ($tableName) {
            $join->on('barang.goodsable_id', '=', $tableName.'.id');
            $join->where('barang.goodsable_type', '=', $this->docType);
        });
        $query = $query->orWhere('uraian_barang', 'like', $search);

        return $query;
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
            'tujuan' => 'string',
            'tanggal_indikasi' => 'nullable|date',
            'zona_waktu' => 'string',
            'detail.type' => 'string',
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
        $tanggal_dokumen = $this->dateFromText($request->tanggal_dokumen);
        $tanggal_indikasi = $this->dateFromText($request->tanggal_indikasi, 'Y-m-d');
        $waktu_indikasi = $this->dateFromText($request->waktu_indikasi, 'H:i:s');
        $request->tempat_indikasi = trim(strtoupper($request->tempat_indikasi));

        return [
            'tanggal_dokumen' => $tanggal_dokumen,
            'sifat' => $request->sifat,
            'klasifikasi' => $request->klasifikasi,
            'tujuan' => $request->tujuan,
            'tempat_indikasi' => $request->tempat_indikasi,
            'tanggal_indikasi' => $tanggal_indikasi,
            'waktu_indikasi' => $waktu_indikasi,
            'zona_waktu' => $request->zona_waktu,
            'kode_kantor' => $request->kantor['kode_kantor'],
            'indikasi' => $request->indikasi,
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

    protected function stored(Request $request) {
        $detail = $this->createNhiDetail($request);
        $this->attachNhiDetail($request, $detail);
        parent::stored($request);
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

    public function updated(Request $request) {
        $existing_detail_type = $this->doc->detail_type;
        $existing_detail_id = $this->doc->detail_id;
        $existing_detail = Relation::getMorphedModel($existing_detail_type)::find($existing_detail_id);

        if ($existing_detail_type == $request->detail['type']) {
            $this->updateNhiDetail($request, $existing_detail);
        } else {
            // Delete previous detail
            $this->deleteNhiDetail($existing_detail);

            // Create new detail
            $detail = $this->createNhiDetail($request);
            $this->attachNhiDetail($request, $detail);
        }

        parent::updated($request);
    }

    protected function attachNhiDetail($request, $detail) {
        $this->doc->update([
            'detail_type' => $request->detail['type'],
            'detail_id' => $detail->id,
        ]);
    }

    protected function createNhiDetail($request) {
        $detail_type = $request->detail['type'];
        $detail_data = $request->detail['data'];
        $detail = Relation::getMorphedModel($detail_type)::create($detail_data);
        $this->updateDetail($detail, $request);
        return $detail;
    }

    protected function updateNhiDetail(Request $request, $detail) {
        $detail->update($request->detail['data']);
        $this->updateDetail($detail, $request);
    }

    protected function deleteNhiDetail($existing_detail) {
        $existing_detail->delete();
    }

    private function updateDetail($detail, $request) {
        $detail_type = $request->detail['type'];

        if (
            ($detail_type == 'nhi-exim') ||
            ($detail_type == 'nhi-tertentu') ||
            ($detail_type == 'nhin-exim')
        ) {
            $this->updateEntitasDetail($detail, $request);
        }

        if (
            ($detail_type == 'nhin-sarkut') ||
            ($detail_type == 'nhin-orang')
        ) {
            $this->updatePelabuhanDetail($detail, $request);
        }

        if ($detail_type == 'nhin-orang') {
            $this->updateOrangDetail($detail, $request);
        }
    }

    private function updateEntitasDetail($detail, $request) {
        if (isset($request->detail['data']['entitas'])) {
            $detail->update([
                'entitas_type' => $request->detail['data']['entitas']['type'],
                'entitas_id' => $request->detail['data']['entitas']['data']['id'],
            ]);
        }
    }

    private function updatePelabuhanDetail($detail, $request) {
        if (isset($request->detail['data']['pelabuhan_asal'])) {
            $detail->update([
                'kode_pelabuhan_asal' => $request->detail['data']['pelabuhan_asal']['iata_code'],
            ]);
        }
        if (isset($request->detail['data']['pelabuhan_tujuan'])) {
            $detail->update([
                'kode_pelabuhan_tujuan' => $request->detail['data']['pelabuhan_tujuan']['iata_code'],
            ]);
        }
    }

    private function updateOrangDetail($detail, $request) {
        if (isset($request->detail['data']['entitas'])) {
            $detail->update([
                'entitas_id' => $request->detail['data']['entitas']['id'],
            ]);
        }
    }
}
