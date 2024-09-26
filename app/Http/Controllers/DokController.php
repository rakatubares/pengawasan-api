<?php

namespace App\Http\Controllers;

use App\Traits\DocumentsChainTrait;
use App\Traits\DocumentTrait;
use App\Traits\PetugasTrait;
use App\Traits\TembusanTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokController extends Controller
{
    use DocumentsChainTrait;
    use DocumentTrait;
    use PetugasTrait;
    use TembusanTrait;
    use UserTrait;

    protected $docType = null;
    protected $model = null;
    protected $resource = null;
    protected $tableResource = null;
    protected $date = null;
    protected $year = null;
    private $errTerbit = 'Dokumen sudah diterbitkan.';
    private $errUnauthorized = 'Unauthorized';

    public function __construct()
    {
        $this->model = $this->getModel($this->docType);
        $this->resource = $this->getResource($this->docType);
        $this->tableResource = $this->getTableResource($this->docType);
    }

    /*
     |--------------------------------------------------------------------------
     | DISPLAY functions
     |--------------------------------------------------------------------------
     */

    /**
     * Display a listing of the resource for datatable.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $docType)
    {
        if ($this->docType == null) {
            $this->docType = $docType;
            $this->__construct();
        }

        $permission = 'view-' . $this->docType;
        $permitted = $this->checkPermission($permission, $request->bearerToken());

        if ($permitted) {
            $doc = new $this->model;
            $searchables = $doc->searchables;

            $docs = $this->model::where(function ($query) use ($request, $searchables)
                {
                    if (count($searchables) > 0) {
                        $search = '%' . $request->flt . '%';
                        foreach ($searchables as $searchable) {
                            $query->where($searchable, 'like', $search);
                        }
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('no_dok', 'desc')
                ->get();
            return $this->tableResource::collection($docs);
        } else {
            return response()->json(['error' => $this->errUnauthorized], 401);
        }
    }

    /**
     * Display data for printout.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $permission = 'view-' . $this->docType;
        $permitted = $this->checkPermission($permission, $request->bearerToken());
        
        if ($permitted) {
            return new $this->resource($this->model::findOrFail($id));
        } else {
            return response()->json(['error' => $this->errUnauthorized], 401);
        }
    }

    /**
     * Filter document by number.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $docType
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $docType)
    {
        if ($this->docType == null) {
            $this->docType = $docType;
            $this->__construct();
        }

        $src = $request->src;
        $flt = $request->flt;
        $exc = $request->exc;
        $search = '%' . $src . '%';

        $search_result = $this->model::where(function ($query) use ($search, $flt)
            {
                $query->where('no_dok_lengkap', 'like', $search)
                    ->when($flt != null, function ($query) use ($flt)
                    {
                        foreach ($flt as $column => $value) {
                            if (is_array($value)) {
                                $query->whereIn($column, $value);
                            } elseif ($value == null) {
                                $query->where($column, $value);
                            } else {
                                $search_value = '%' . $value . '%';
                                $query->where($column, 'like', $search_value);
                            }
                        }
                        return $query;
                    });
            })
            ->when($exc != null, function ($query) use ($exc)
            {
                return $query->orWhere('id', $exc);
            })
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
        return $this->tableResource::collection($search_result);
    }

    /**
     * Validate request
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function validateData(Request $request) {}

    /**
     * Prepare data SBP from request to array
     *
     * @param Request $request
     * @return Array
     */
    protected function prepareData(Request $request) { return []; }

    /*
     |--------------------------------------------------------------------------
     | Create functions
     |--------------------------------------------------------------------------
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(Request $request)
    {
        $permission = 'create-' . $this->docType;
        $permitted = $this->checkPermission($permission, $request->bearerToken());

        if ($permitted) {
            DB::beginTransaction();
            try {
                // Pre-creation operation
                $data = $this->storing($request);

                // Save document to database
                $this->doc = $this->model::create($data);

                // Post-creation operation
                $this->stored($request);
                
                // Commit query
                DB::commit();

                // Return data resource
                return $this->show($request, $this->doc->id);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        } else {
            return response()->json(['error' => $this->errUnauthorized], 401);
        }
    }

    protected function storing(Request $request) {
        $this->validateData($request);
        return $this->prepareData($request);
    }

    protected function stored(Request $request) {
        // Save details if exist
        if ($request->has('petugas')) {$this->savePetugas($request->petugas, $this->doc);}
        if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
    }

    /*
     |--------------------------------------------------------------------------
     | Update functions
     |--------------------------------------------------------------------------
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function update(Request $request, $docId)
    {
        // Check if document is not published yet
        $this->doc = $this->getDocument($this->docType, $docId);
        $is_unpublished = $this->checkUnpublished($this->doc);

        if ($is_unpublished) {
            $permission = 'create-' . $this->docType;
            $user = $this->getUserInfo($request->bearerToken());
            $permitted = $this->checkPermission($permission, $request->bearerToken());
            $match_user = $user['nip'] == $this->doc->created_by;

            if ($match_user && $permitted) {
                DB::beginTransaction();
                try {
                    // Pre-update operation
                    $data = $this->updating($request);

                    // Update data on database
                    $this->doc->edit($data);

                    // Post-update operation
                    $this->updated($request);

                    // Commit query
                    DB::commit();
        
                    // Return data
                    return $this->show($request, $this->doc->id);
                } catch (\Throwable $th) {
                    DB::rollBack();
                    throw $th;
                }
            } else {
                return response()->json(['error' => $this->errUnauthorized], 401);
            }
        } else {
            return response()->json(['error' => $this->errTerbit], 422);
        }
    }

    protected function updating(Request $request) {
        $this->validateData($request);
        return $this->prepareData($request, 'update');
    }

    protected function updated(Request $request) {
        // Update details if exist
        if ($request->has('petugas')) { $this->updatePetugas($request->petugas, $this->doc);}
        if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
    }

    /*
     |--------------------------------------------------------------------------
     | Booking number functions
     |--------------------------------------------------------------------------
     */

    /**
     * Book document number.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function book(Request $request, $docId)
    {
        $this->doc = $this->getDocument($this->docType, $docId);
        $is_draft = $this->doc->kode_status == 'draft';

        if ($is_draft) {
            $permission = 'create-' . $this->docType;
            $user = $this->getUserInfo($request->bearerToken());
            $permitted = $this->checkPermission($permission, $request->bearerToken());
            $match_user = $user['nip'] == $this->doc->created_by;

            if ($match_user && $permitted) {
                DB::beginTransaction();
                try {
                    $this->doc->book();
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    throw $th;
                }
            } else {
                return response()->json(['error' => $this->errUnauthorized], 401);
            }
        } else {
            return response()->json(['error' => $this->errTerbit], 422);
        }
    }

    /*
     |--------------------------------------------------------------------------
     | Publish functions
     |--------------------------------------------------------------------------
     */

    /**
     * Publish document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, $docId)
    {
        $this->doc = $this->getDocument($this->docType, $docId);
        $is_unpublished = $this->checkUnpublished($this->doc);
        if ($is_unpublished) {
            $permission = 'create-' . $this->docType;
            $user = $this->getUserInfo($request->bearerToken());
            $permitted = $this->checkPermission($permission, $request->bearerToken());
            $match_user = $user['nip'] == $this->doc->created_by;

            if ($match_user && $permitted) {
                DB::beginTransaction();
                try {
                    $this->doc->publish();
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    throw $th;
                }
            } else {
                return response()->json(['error' => $this->errUnauthorized], 401);
            }
        } else {
            return response()->json(['error' => $this->errTerbit], 422);
        }
    }

    /*
     |--------------------------------------------------------------------------
     | Destroy functions
     |--------------------------------------------------------------------------
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $docId)
    {
        $this->doc = $this->getDocument($this->docType, $docId);
        $is_draft = $this->doc->kode_status == 'draft';

        if ($is_draft) {
            $permission = 'delete-' . $this->docType;
            $user = $this->getUserInfo($request->bearerToken());
            $permitted = $this->checkPermission($permission, $request->bearerToken());
            $match_user = $user['nip'] == $this->doc->created_by;

            if ($match_user && $permitted) {
                DB::beginTransaction();
                try {
                    $this->doc->delete();
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    throw $th;
                }
            } else {
                return response()->json(['error' => $this->errUnauthorized], 401);
            }
        } else {
            return response()->json(['error' => $this->errTerbit], 422);
        }
    }

    /*
     |--------------------------------------------------------------------------
     | Rollback functions
     |--------------------------------------------------------------------------
     */

    /**
     * Rollback published document status for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rollback(Request $request, $docId) {
        // Check if document is already published
        $this->doc = $this->getDocument($this->docType, $docId);
        $is_published = !$this->checkUnpublished($this->doc);

        if ($is_published) {
            $permission = 'rollback-' . $this->docType;
            $permitted = $this->checkPermission($permission, $request->bearerToken());

            if ($permitted) {
                DB::beginTransaction();
                try {
                    $this->doc->rollback($request->keterangan);
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    throw $th;
                }
            } else {
                return response()->json(['error' => $this->errUnauthorized], 401);
            }
        } else {
            return response()->json(['error' => 'Dokumen belum diterbitkan.'], 422);
        }
    }

    /*
     |--------------------------------------------------------------------------
     | Relation functions
     |--------------------------------------------------------------------------
     */

    protected function attachTo($docType, $docId, $columnName=null) {
        $relatedDoc = $this->getDocument($docType, $docId);
        $relatedDoc->followedUp($columnName);
        return $relatedDoc;
    }

    protected function detachFrom($docType, $docId, $columnName=null) {
        $relatedDoc = $this->getDocument($docType, $docId);
        $relatedDoc->unFollowedUp($columnName);
    }
}
