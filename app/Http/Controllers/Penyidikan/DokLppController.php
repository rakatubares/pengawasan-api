<?php

namespace App\Http\Controllers\Penyidikan;

use App\Http\Controllers\DokController;
use App\Models\Penyidikan\Penyidikan;
use App\Models\Penyidikan\PenyidikanBhp;
use Illuminate\Http\Request;

class DokLppController extends DokController
{
	protected $doc_type = 'lpp';

	protected function prepareData(Request $request) 
	{
		$data = [
			'asal_perkara' => $request->asal_perkara,
			'jenis_penindakan' => $request->jenis_penindakan,
			'jenis_perkara_id' => $request->jenis_perkara['id'],
			'catatan' => $request->catatan,
		];

		return $data;
	}

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		// Get source's chain
		$source = $this->attachTo($request->lp['type'], $request->lp['id']);
		$chain = $source->chain;

		// Attach to chain's documents
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function stored(Request $request) 
	{
		$this->createPenyidikan($request);
		parent::stored($request);
	}

	protected function updating(Request $request) 
	{
		$data = parent::updating($request);

		// Get existing source
		$existing_source_type = $this->doc->chain->lp
			? 'lp' : 'lpn';
		$existing_source_id = $this->doc->chain->$existing_source_type->id;

		// Change chain
		$this->different_chain = false;
		if (
			($existing_source_type != $request->lp['type']) ||
			($existing_source_id != $request->lp['id'])
		) {
			$this->different_chain = true;

			// Detach from previous LP
			$this->detachFrom($existing_source_type, $existing_source_id);

			// Attach to new source
			$source = $this->attachTo($request->lp['type'], $request->lp['id']);
			$chain = $source->chain;

			$data['chain_id'] = $chain->id;

			// Remove previous penyidikan
			$this->doc->chain->penyidikan->delete();

			// Create new penyidikan
			$this->createPenyidikan($request, $chain->id);
		}

		return $data;
	}

	private function createPenyidikan(Request $request, $chain_id=null) 
	{
		$chain_id = $chain_id ? $chain_id : $this->doc->chain->id;

		$penyidikan = Penyidikan::create([
			'chain_id' => $chain_id,
			'jenis_pelanggaran' => $request->penyidikan['jenis_pelanggaran'],
			'pasal' => $request->penyidikan['pasal'],
			'tempat_pelanggaran' => $request->penyidikan['tempat_pelanggaran'],
			'tanggal_pelanggaran' => $request->penyidikan['tanggal_pelanggaran'],
			'waktu_pelanggaran' => $request->penyidikan['waktu_pelanggaran'],
			'modus' => $request->penyidikan['modus'],
			'pelaku_id' => $request->penyidikan['pelaku']['id'],
			'tertangkap_tangan' => $request->penyidikan['tertangkap_tangan'],
		]);

		// Get penindakan
		$lp_type = $request->lp['type'];
		$lp_id = $request->lp['id'];
		$lp = $this->getDocument($lp_type, $lp_id);
		$penindakan = $lp->chain->penindakan;

		// Create BHP
		$barang = $penindakan->barang;
		$sarkut = $penindakan->sarkut;
		$bhp = new PenyidikanBhp();
		$bhp->penyidikan_id = $penyidikan->id;
		$bhp->jumlah_kemasan = $barang ? $barang->jumlah_kemasan : null;
		$bhp->jenis_kemasan_id = $barang ? $barang->jenis_kemasan_id : null;
		$bhp->nomor_kemasan = $barang ? $barang->nomor_kemasan : null;
		$bhp->jenis_dokumen = $barang ? $barang->jenis_dokumen : null;
		$bhp->nomor_dokumen = $barang ? $barang->nomor_dokumen : null;
		$bhp->tanggal_dokumen = $barang ? $barang->tanggal_dokumen : null;
		$bhp->nama_sarkut = $sarkut ? $sarkut->nama_sarkut : null;
		$bhp->jenis_sarkut = $sarkut ? $sarkut->jenis_sarkut : null;
		$bhp->nomor_sarkut = $sarkut ? $sarkut->nomor_sarkut : null;
		$bhp->registrasi_sarkut = $sarkut ? $sarkut->registrasi_sarkut : null;
		$bhp->nomor_kontainer = $sarkut ? $sarkut->nomor_kontainer : null;
		$bhp->ukuran_kontainer = $sarkut ? $sarkut->ukuran_kontainer : null;
		$bhp->save();

		// Create BHP items
		if ($barang) {
			$item_barang = $barang->barang->toArray();
			foreach ($item_barang as $item) {
				unset($item['id']);
				$bhp->barang()->create($item);
			}
		}
	}
}
