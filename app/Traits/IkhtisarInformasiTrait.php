<?php

namespace App\Traits;

use App\Models\Intelijen\IkhtisarInformasi;

trait IkhtisarInformasiTrait
{
	protected function createIkhtisarInformasi($doc, $infos) {
		$this->createIkhtisar($doc);
		foreach ($infos as $info) {
			$this->createInformasi($info);
		}
	}

	protected function updateIkhtisarInformasi($doc, $new_infos) {
		$this->getIkhtisar($doc);
		$old_infos = $this->ikhtisar->informasi;

		// Update existing info or insert new info if the new ones more than old ones
		foreach ($new_infos as $k => $info) {
			if ($k < sizeof($old_infos)) {
				$info_id = $old_infos[$k]['id'];
				$this->updateInformasi($info_id, $info);
			} else {
				$this->createInformasi($info);
			}
		}

		// Delete exceeding info if the old ones more than the new ones
		if (sizeof($new_infos) < sizeof($old_infos)) {
			for ($i=sizeof($new_infos); $i < sizeof($old_infos); $i++) { 
				$info_id = $old_infos[$i]['id'];
				$this->deleteInformasi($info_id);
			}
		}
	}

	private function createIkhtisar($doc) {
		$this->ikhtisar = IkhtisarInformasi::create(['chain_id' => $doc->chain->id]);
	}

	private function getIkhtisar($doc) {
		$this->ikhtisar = $doc->chain->ikhtisar_informasi;
	}

	private function createInformasi($informasi) {
		$this->ikhtisar->informasi()->create($informasi);
	}

	private function updateInformasi($info_id, $info) {
		$this->ikhtisar->informasi()->find($info_id)->update($info);
	}

	private function deleteInformasi($info_id) {
		$this->ikhtisar->informasi()->find($info_id)->delete();
	}
}
