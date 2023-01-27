<?php

namespace App\Http\Controllers;

use App\Http\Resources\LampiranResource;
use App\Http\Resources\TrackingSbpResource;
use App\Models\TrackingSbp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackingSbpController extends Controller
{
	public function tracking(Request $request)
	{
		$sbp = TrackingSbp::where('no_dok', $request->nomor)
			->where('thn_dok', $request->tahun)
			->where('no_identitas', $request->identitas)
			->first();

		if ($sbp == null) {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 404);
		} else {
			$result = new TrackingSbpResource($sbp);
		}
		
		return $result;
	}

	public function getAttachments($id)
	{
		$tracking = TrackingSbp::findOrFail($id);
		$attachments = $tracking->attachment;
		$resource = LampiranResource::collection($attachments);
		return $resource;
	}

	public function addAttachment(Request $request, $id)
	{
		// Get tracking object
		$tracking = TrackingSbp::findOrFail($id);

		// Get uploaded file
		$uploaded_file = $request->file('attachment');

		// Get current date
		$y = date("Y");
		$m = date("m");
		$d = date("d");
		$current_time = date('ymdHis');

		// Get file extension
		$mime_type = $uploaded_file->getClientMimeType();
		$ext = $uploaded_file->getClientOriginalExtension();

		// Construct file name
		$origin_name = $uploaded_file->getClientOriginalName();
		$file_name = pathinfo($origin_name, PATHINFO_FILENAME);
		$file_name = strtolower($file_name);
		$file_name = preg_replace('/[^\da-z]/i', '_', $file_name);
		$file_name = preg_replace('/[_]+/', '_', $file_name);
		$file_name = $current_time . '_' . $file_name . '.' . $ext;

		// Construct file path
		$path = 'sbp/lamp/'.$y.'/'.$m.'/'.$d.'/';

		// Save attachment data
		$tracking->attachment()->create([
			'mime_type' => $mime_type,
			'path' => $path,
			'filename' => $file_name,
			'description' => $request->description,
		]);

		// Save file
		Storage::putFileAs($path, $uploaded_file, $file_name);
	}
}
