<?php

namespace App\Http\Controllers\Entitas;

use App\Http\Controllers\Controller;

class EntitasIdentitasController extends Controller
{
    public function saveIdentitas($entity, $identities) {
		$entity->identitas()->createMany($identities);
	}

	public function updateIdentitas($entity, $new_identities) {
		// Get existing identitas
		$existing_identities = $entity->identitas;

		// Get persisting identities id
		$persisting_identities_id = array_map(function ($identity) {
			if ($identity['id'] != null) {
				return $identity['id'];
			}
		}, $new_identities);

		// Update existing identities
		foreach ($existing_identities as $existing_identity) {
			if (in_array($existing_identity->id, $persisting_identities_id)) {
				// Get matching identity data
				$persisting_identity = null;
				foreach ($new_identities as $new_identity) {
					if ($new_identity['id'] == $existing_identity->id) {
						$persisting_identity = $new_identity;
					}
				}

				// Update the identity
				$entity->identitas()
					->find($existing_identity->id)
					->update($persisting_identity);
			} else {
				$entity->identitas()
					->find($existing_identity->id)
					->delete();
			}
		};

		// Insert new identities
		foreach ($new_identities as $new_identity) {
			if ($new_identity['id'] == null) {
				$entity->identitas()->create($new_identity);
			}
		}
	}
}
