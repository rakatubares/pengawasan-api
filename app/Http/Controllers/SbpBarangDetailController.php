<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpBarangDetailResource;
use App\Models\SbpHeader;
use App\Models\SbpPenindakanBarang;
use Illuminate\Http\Request;

class SbpBarangDetailController extends Controller
{
	/**
     * Get valid penindakan barang id.
     *
     * @param int $sbp_header id
	 * @return int $sbp_penindakan_barang id
     */
	private function getPenindakanId($sbp_id)
	{
		$sbp_barang = new SbpPenindakanBarangController();
		$sbp_barang_data = $sbp_barang->show($sbp_id);
		$sbp_penindakan_id = $sbp_barang_data->id;
		return $sbp_penindakan_id;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sbp_id)
    {
		// Get valid sbp_penindakan_barang id
		$sbp_penindakan_id = $this->getPenindakanId($sbp_id);

		// Show data detail barang
        $detail_barang = SbpHeader::find($sbp_id)
			->detailBarang()
			->where('sbp_penindakan_barangs.id', $sbp_penindakan_id)
			->get();
		$detail_barang_array = SbpBarangDetailResource::collection($detail_barang);
		return $detail_barang_array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sbp_id)
    {
		// Get valid sbp_penindakan_barang id
		$sbp_penindakan_id = $this->getPenindakanId($sbp_id);

		// Insert detail barang
        $insert_result = SbpPenindakanBarang::find($sbp_penindakan_id)
			->detailBarang()
			// ->createMany($request->all());
			->create([
				'uraian_barang' => $request->uraian_barang,
				'jumlah_barang' => $request->jumlah_barang,
				'satuan_barang' => $request->satuan_barang,
			]);

		$result_array = new SbpBarangDetailResource($insert_result);
		return $result_array;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sbp_id, $detail_id)
    {
		$sbp_barang_detail = SbpHeader::find($sbp_id)
			->detailBarang()
			->where('sbp_barang_details.id', $detail_id)
			->first();
		$sbp_barang_detail_array = new SbpBarangDetailResource($sbp_barang_detail);
		return $sbp_barang_detail_array;
		// return $sbp_barang_detail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sbp_id, $detail_id)
    {
        $update_result = SbpHeader::find($sbp_id)
			->detailBarang()
			->where('sbp_barang_details.id', $detail_id)
			->update([
				'uraian_barang' => $request->uraian_barang,
				'jumlah_barang' => $request->jumlah_barang,
				'satuan_barang' => $request->satuan_barang,
			]);
		return $update_result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sbp_id, $detail_id)
    {
        $delete_result = SbpHeader::find($sbp_id)
			->detailBarang()
			->where('sbp_barang_details.id', $detail_id)
			->delete();
		return $delete_result;
    }
}
