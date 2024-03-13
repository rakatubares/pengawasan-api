<?php

namespace App\Http\Controllers;

use App\Traits\DocumentsChainTrait;
use App\Traits\DocumentTrait;
use App\Traits\PetugasTrait;
use App\Traits\TembusanTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokController extends Controller
{
	use DocumentsChainTrait;
	use DocumentTrait;
	use PetugasTrait;
	use TembusanTrait;

	protected $doc = null;
	protected $doc_type = null;
	protected $model = null;
	protected $resource = null;
	protected $table_resource = null;
	protected $date = null;
	protected $year = null;
	protected $unpublished_status = ['draft'];

	public function __construct($doc_type=null)
	{
		$this->doc_type = $doc_type;
		$this->model = $this->getModel($this->doc_type);
		$this->resource = $this->getResource($this->doc_type);
		$this->table_resource = $this->getTableResource($this->doc_type);
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
	public function index()
	{
		$all_docs = $this->model::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$docs_list = $this->table_resource::collection($all_docs);
		return $docs_list;
	}

	/**
	 * Display data for printout.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$doc = new $this->resource($this->model::findOrFail($id));
		return $doc;
	}

	/**
	 * Display search result.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $doc_type
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request, $doc_type) {
		// return $doc_type;

		if ($this->doc_type == null) {
			$this->__construct($doc_type);
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
							} else if ($value == null) {
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
		$search_list = $this->table_resource::collection($search_result);
		return $search_list;
	}

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
			$resource = $this->show($this->doc->id);
			return $resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	protected function storing(Request $request) { 
		$this->validateData($request);
		$data = $this->prepareData($request);
		return $data; 
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
	protected function update(Request $request, $doc_id)
	{
		// Check if document is not published yet
		$this->doc = $this->getDocument($this->doc_type, $doc_id);
		$is_unpublished = $this->checkUnpublished($this->doc);

		if ($is_unpublished) {
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
				$resource = $this->show($this->doc->id);
				return $resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	protected function updating(Request $request) { 
		$this->validateData($request);
		$data = $this->prepareData($request, 'update');
		return $data; 
	}

	protected function updated(Request $request) {
		// Update details if exist
		if ($request->has('petugas')) { $this->updatePetugas($request->petugas, $this->doc);}
		if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
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
	public function publish($doc_id)
	{
		$this->doc = $this->getDocument($this->doc_type, $doc_id);
		$is_unpublished = $this->checkUnpublished($this->doc);
		if ($is_unpublished) {
			DB::beginTransaction();
			try {
				$this->doc->publish();
				DB::commit();
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
			return $result;
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
	public function destroy($doc_id)
	{
		$this->doc = $this->getDocument($this->doc_type, $doc_id);
		$is_unpublished = $this->checkUnpublished($this->doc);
		if ($is_unpublished) {
			DB::beginTransaction();
			try {
				$this->doc->delete();
				
				DB::commit();
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
			return $result;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Relation functions
	 |--------------------------------------------------------------------------
	 */

	protected function attachTo($doc_type, $doc_id) {
		$related_doc = $this->getDocument($doc_type, $doc_id);
		$related_doc->followedUp();
		return $related_doc;
	}

	protected function detachFrom($doc_type, $doc_id) {
		$related_doc = $this->getDocument($doc_type, $doc_id);
		$related_doc->unFollowedUp();
	}
}