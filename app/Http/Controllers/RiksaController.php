<?php

namespace App\Http\Controllers;

use App\Http\Resources\RiksaTableResource;
use App\Models\Riksa;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class RiksaController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/RIKSA/KPU.03/BD.05/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_tegah = Riksa::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$tegah_list = RiksaTableResource::collection($all_tegah);
		return $tegah_list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;

		$insert_result = Riksa::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'kode_status' => 100,
		]);

		return $insert_result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
