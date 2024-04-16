<?php

// https://stackoverflow.com/questions/16661292/add-new-methods-to-a-resource-controller-in-laravel

namespace App\Services;

use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;

class ResourceRegistrar extends OriginalRegistrar
{
	/**
	 * Create a new resource registrar instance.
	 *
	 * @param  \App\Services\Router  $router
	 * @return void
	 */
	public function __construct(Router $router)
	{
		$this->router = $router;
	}

	/**
	 * The default actions for a resourceful controller.
	 *
	 * @var string[]
	 */
	protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'publish'];

	/**
	 * Add the pubish method for a resourceful route.
	 *
	 * @param  string  $name
	 * @param  string  $base
	 * @param  string  $controller
	 * @param  array  $options
	 * @return \Illuminate\Routing\Route
	 */
	protected function addResourcePublish($name, $base, $controller, $options)
	{
		$name = $this->getShallowName($name, $options);

		$uri = $this->getResourceUri($name).'/{'.$base.'}/publish';

		$action = $this->getResourceAction($name, $controller, 'publish', $options);

		return $this->router->match(['PUT', 'PATCH'], $uri, $action);
	}
}