<?php

namespace App\Http\Controllers;

use App\Http\Resources\TembusanResource;
use App\Models\RefTembusan;
use Illuminate\Http\Request;

class TembusanController extends Controller
{
	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$exc = $request->exc;
		$search = '%' . $src . '%';
		$except = array_filter($exc, 'strlen');

		$search_result = RefTembusan::where('uraian', 'like', $search)
			->whereNotIn('uraian', $except)
			->orderBy('uraian')
			->take(5)
			->get();

		$search_list = TembusanResource::collection($search_result);
		return $search_list;
	}

	public function setCc($doc_model, $doc_id, $cc_list)
	{
		$cc_refs = $this->getRefCc();
		$existing_cc = $this->getExistingCc($doc_model, $doc_id);

		// Attach new CC
		$cc_ids = [];
		foreach ($cc_list as $key => $cc) {
			try {
				$id = $cc_refs[strtolower($cc)];
			} catch (\Throwable $th) {
				$new_cc = RefTembusan::create(['uraian' => $cc]);
				$id = $new_cc->id;
			}
			$cc_ids[$id] = ['no_urut' => $key+1];
		}
		$doc_model::find($doc_id)->tembusan()->syncWithoutDetaching($cc_ids);

		// Detach deleted CC
		foreach ($existing_cc as $cc) {
			$ref = RefTembusan::where(['uraian' => $cc])->first();
			if (!in_array($cc, array_map('strtolower', $cc_list))) {
				$doc_model::find($doc_id)->tembusan()->updateExistingPivot($ref->id, ['deleted_at' => now()]);
			}
		}
	}

	private function getRefCc()
	{	
		$ref_data = RefTembusan::all()->toArray();
		$refs = [];
		foreach ($ref_data as $d) { $refs[strtolower($d['uraian'])] = $d['id']; }
		return $refs;
	}

	private function getExistingCc($doc_model, $doc_id)
	{
		$existing_cc_data = $doc_model::find($doc_id)->tembusan->toArray();
		$existing_cc = array_map(function($d) { return strtolower($d['uraian']); }, $existing_cc_data);
		return $existing_cc;
	}
}
