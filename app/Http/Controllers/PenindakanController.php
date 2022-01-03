<?php

namespace App\Http\Controllers;

use App\Http\Resources\PenindakanResource;
use App\Models\Penindakan;
use Illuminate\Http\Request;

class PenindakanController extends Controller
{
    /**
	 * 
	 */
	public function show($id)
	{
		$penindakan = new PenindakanResource(Penindakan::find($id));
		return $penindakan;
	}
}
