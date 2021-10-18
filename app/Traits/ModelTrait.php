<?php

namespace App\Traits;

use App\Models\Segel;
use Illuminate\Database\Eloquent\Model;

trait ModelTrait
{
	private $models = [
		'segel' => Segel::class,
	];

	/**
	 * Get model by doc type
	 * 
	 * @param string $doc_type
	 * @return Model
	 */
	public function getModel($doc_type)
	{
		if (array_key_exists($doc_type, $this->models)) {
			$model = $this->models[$doc_type];
		} else {
			$model = null;
		}
		
		return $model;
	}
}