<?php

namespace App\Http\Resources;

class DokBastResource extends RequestBasedResource
{
	private function getEntity($entity_object, $entity_type, $atas_nama)
	{
		switch ($entity_type) {
			case 'pegawai':
				$entity = new RefUserResource($entity_object);
				break;

			case 'orang':
				$entity = new RefEntitasResource($entity_object);
				break;
			
			default:
				# code...
				break;
		}

		$array = [
			'type' => $entity_type,
			'data' => $entity,
			'atas_nama' => $atas_nama,
		];

		return $array;
	}

	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'yang_menerima' => $this->getEntity($this->yang_menerima, $this->yang_menerima_type, $this->atas_nama_yang_menerima),
			'yang_menyerahkan' => $this->getEntity($this->yang_menyerahkan, $this->yang_menyerahkan_type, $this->atas_nama_yang_menyerahkan),
			'dalam_rangka' => $this->dalam_rangka,
		];

		return $array;
	}

	protected function pdf()
	{
		$array = $this->basic();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->objectable, $this->object_type);
	}
}
