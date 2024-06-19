<?php

namespace App\Http\Resources;

class ListPosisiPegawaiResource
{
	public static function associative($resource) {
		$array = PosisiPegawaiResource::collection($resource);
		$associative_array = [];
		foreach ($array as $a) {
			$associative_array[$a['posisi']] = $a;
		}
		
		return $associative_array;
	}
}