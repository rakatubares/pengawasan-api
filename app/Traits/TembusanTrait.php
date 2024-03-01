<?php

namespace App\Traits;

use App\Models\References\RefTembusan;

trait TembusanTrait 
{
	protected function setTembusan($tembusan, $doc) 
	{
		$ref_tembusan = $this->getRefTembusan();
		$this->synchronizeTembusan($doc, $tembusan, $ref_tembusan);
	}

	private function getRefTembusan() {
		$ref_data = RefTembusan::all()->toArray();
		$ref = [];
		foreach ($ref_data as $d) { $ref[strtolower($d['uraian'])] = $d['id']; }
		return $ref;
	}

	private function getAttachedTembusan($doc) {
		$attached_data = $doc->tembusan->toArray();
		$attached = array_map(function($d) { 
			return strtolower($d['uraian']); 
		}, $attached_data);
		return $attached;
	}
	
	private function synchronizeTembusan($doc, $tembusan, $reference) {
		$tembusan_ids = [];
		foreach ($tembusan as $key => $value) {
			if ($value != null) {
				try {
					$id = $reference[strtolower($value)];
				} catch (\Throwable $th) {
					$new_ref = RefTembusan::create(['uraian' => $value]);
					$id = $new_ref->id;
				}
				$tembusan_ids[$id] = ['no_urut' => $key+1];
			}
		}
		$doc->tembusan()->sync($tembusan_ids);
	}
}