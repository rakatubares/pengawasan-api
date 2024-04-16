<?php

// https://stackoverflow.com/questions/39915619/how-to-extend-illuminate-routing-route-in-laravel

namespace App\Services;

use Illuminate\Routing\Router as OriginalRouter;

class Router extends OriginalRouter
{
	/**
	 * Register an array of API resource controllers.
	 *
	 * @param  array  $resources
	 * @param  array  $options
	 * @return void
	 */
	public function docResources(array $resources, array $options = [])
	{
		foreach ($resources as $name => $controller) {
			$this->docResource($name, $controller, $options);
		}
	}

	/**
	 * Route an API resource to a controller.
	 *
	 * @param  string  $name
	 * @param  string  $controller
	 * @param  array  $options
	 * @return \Illuminate\Routing\PendingResourceRegistration
	 */
	public function docResource($name, $controller, array $options = [])
	{
		$only = ['index', 'show', 'store', 'update', 'destroy', 'publish'];

		if (isset($options['except'])) {
			$only = array_diff($only, (array) $options['except']);
		}

		return $this->resource($name, $controller, array_merge([
			'only' => $only,
		], $options));
	}
}