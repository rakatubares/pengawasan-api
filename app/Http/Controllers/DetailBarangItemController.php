<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangItemResource;
use App\Http\Resources\DetailBarangItemWithImagesResource;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DokNhi;
use App\Models\Lampiran;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailBarangItemController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

    /**
     * Get valid penindakan barang id.
     *
     * @param  string  $doc_type
     * @param  int  $doc_id
	 * @return int  $detail_barang id
     */
	private function getDetailBarangId($doc_type, $doc_id)
	{
		$detail_barang = new DetailBarangController();
		$detail_barang_data = $detail_barang->show($doc_type, $doc_id);
		$detail_barang_id = $detail_barang_data->id;
		return $detail_barang_id;
	}

	/**
     * Display a listing of the resource.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
    public function index($doc_type, $doc_id)
    {
		// Get header model
		$model = $this->switchObject($doc_type, 'model');
		$dokumen = $model::find($doc_id);

		// Show data detail barang
		if ($dokumen) {
			try {
				// Get list item barang
				if ($doc_type == 'bast') {
					$item_barang_list = $dokumen->objectable->itemBarang()
						->get();
				} else {
					$item_barang_list = $dokumen->penindakan->objectable->itemBarang()
						->get();
				}
				
				$result = DetailBarangItemResource::collection($item_barang_list);
			} catch (\Throwable $th) {
				$result = response()->json(['error' => 'Detail barang tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
		}

		return $result;
    }

	private function getParentObject($header, $doc_type, $doc_id=null)
	{
		$parent_name = $this->switchObject($doc_type, 'parent');
		if ($parent_name == 'penindakan') {
			$parent_object = $header->penindakan;
		} else if ($parent_name == 'bast') {
			$parent_object = $header;
		} else if ($parent_name == 'intelijen') {
			if ($doc_type == 'nhi') {
				if ($header->objectable == null) {
					$barang = DetailBarang::create();
					$header->update(['barang_id' => $barang->id]);
					$parent_object = DokNhi::find($doc_id);
				} else {
					$parent_object = $header;
				}
				$parent_object->object_type = 'barang';
			}
		}

		return $parent_object;
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request, $doc_type, $doc_id)
	{
		// Get header model
		$model = $this->switchObject($doc_type, 'model');

		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		if ($is_unpublished) {
			// Get header document
			$header = $model::find($doc_id);

			// Insert data detail barang
			if ($header) {
				try {
					// Get parent object
					$parent_object = $this->getParentObject($header, $doc_type, $doc_id);

					DB::beginTransaction();
					try {
						// Insert detail barang
						$item_barang = $parent_object->objectable->itemBarang()
							->create([
								'uraian_barang' => $request->uraian_barang,
								'jumlah_barang' => $request->jumlah_barang,
								'satuan_id' => $request->satuan['id'],
								'kategori_id' => $request->kategori['id'],
							]);

						// Save images
						if (sizeof($request->image_list) > 0) {
							foreach($request->image_list as $image) {
								$this->saveFile($image, $item_barang);
							}
						}

						DB::commit();
						$result = new DetailBarangItemWithImagesResource(DetailBarangItem::find($item_barang->id));
					} catch (\Throwable $th) {
						DB::rollBack();
						throw $th;
					}
					
				} catch (\Throwable $th) {
					$result = response()->json(['error' => 'Detail barang tidak ditemukan.'], 422);
				}
			} else {
				$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat menambah item barang.'], 422);
		}

		return $result;
	}

	private function saveFile($image, $item_barang)
	{
		// Get image from base64
		@list($type, $file_data) = explode(';', $image['content']);
		@list(, $file_data) = explode(',', $file_data); 
		$decoded_image = base64_decode($file_data);

		// Get file extension
		$f = finfo_open();
		$mime_type = finfo_buffer($f, $decoded_image, FILEINFO_MIME_TYPE);
		@list($obj, $ext) = explode('/', $mime_type);

		// Construct file name and path
		$filename = uniqid('', true).'.'.$ext;
		$y = date("Y");
		$m = date("m");
		$d = date("d");
		$path = 'img/'.$y.'/'.$m.'/'.$d.'/';
		$filepath = $path.$filename;

		// Save image file
		Storage::put($filepath, $decoded_image);

		// Store image data
		$item_barang->images()->create([
			'mime_type' => $mime_type,
			'path' => $path,
			'filename' => $filename
		]);
	}

	/**
     * Display the specified resource.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
	public function show($doc_type, $doc_id, $item_id)
	{
		// Get header model
		$model = $this->switchObject($doc_type, 'model');
		$header = $model::find($doc_id);

		if ($header) {
			// Get parent object
			$parent_object = $this->getParentObject($header, $doc_type, $doc_id);

			// Get data item barang
			$item_barang = $parent_object->objectable->itemBarang()
				->where('detail_barang_items.id', $item_id)
				->first();

			if ($item_barang != null) {
				$result = new DetailBarangItemWithImagesResource($item_barang);
			} else {
				$result = response()->json(['error' => 'Item barang tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
		}
		
		return $result;
	}

	/**
     * Update the specified resource.
     *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $doc_type, $doc_id, $item_id)
	{
		// Get header model
		$model = $this->switchObject($doc_type, 'model');

		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished($model, $doc_id);
		
		if ($is_unpublished) {
			// Get header document
			$header = $model::find($doc_id);

			if ($header) {
				// Get parent object
				$parent_object = $this->getParentObject($header, $doc_type, $doc_id);

				DB::beginTransaction();
				try {
					// Update data item barang
					$parent_object->objectable->itemBarang()
						->where('detail_barang_items.id', $item_id)
						->update([
							'uraian_barang' => $request->uraian_barang,
							'jumlah_barang' => $request->jumlah_barang,
							'satuan_id' => $request->satuan['id'],
							'kategori_id' => $request->kategori['id'],
						]);

					// Get existing images
					$item_barang = DetailBarangItem::find($item_id);
					$existing_images = $item_barang->images->all();

					// Delete image if not in request and save new image
					if (sizeof($existing_images) > 0) {
						$existing_ids = array_map(function($i) {return $i->id;}, $existing_images);
						$delete_ids = $existing_ids;
						
						// Check each image request
						foreach($request->image_list as $image) {
							if (array_key_exists('id', $image)) {
								if (($key = array_search($image['id'], $delete_ids)) !== false) {
									unset($delete_ids[$key]);
								}								
							} else {
								$this->saveFile($image, $item_barang);
							}
						}
						
						// Delete id
						foreach($delete_ids as $id) {
							Lampiran::find($id)->delete();
						}
					} else {
						foreach ($request->image_list as $image) {
							$this->saveFile($image, $item_barang);
						}
					}

					DB::commit();

					$result = new DetailBarangItemWithImagesResource(DetailBarangItem::find($item_id));
				} catch (\Throwable $th) {
					DB::rollBack();
					throw $th;
				}
			} else {
				$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengubah item barang.'], 422);
		}
		
		return $result;
	}

	/**
     * Remove the specified resource from storage.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($doc_type, $doc_id, $item_id)
    {
		// Get header model
		$model = $this->switchObject($doc_type, 'model');

		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		if ($is_unpublished) {
			// Get header document
			$header = $model::find($doc_id);

			// Get parent object
			$parent_object = $this->getParentObject($header, $doc_type, $doc_id);

			// Delete if object type is barang
			if ($parent_object->object_type == 'barang') {
				$result = DetailBarangItem::find($item_id)->delete();
				
				// Delete NHI object if no item
				if ($doc_type == 'nhi') {
					$item_count = DokNhi::find($doc_id)->objectable->itemBarang->count();
					if ($item_count == 0) {
						$parent_object->objectable->delete();
					}
				}
			} else {
				$result = response()->json(['error' => 'Objek bukan barang, tidak dapat menghapus item barang.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat menghapus item barang.'], 422);
		}
		
		return $result;
    }
}
