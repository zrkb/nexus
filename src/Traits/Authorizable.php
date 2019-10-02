<?php

namespace Nexus\Traits;

use Illuminate\Auth\Access\AuthorizationException;
use Nexus\Exceptions\AuthorityException;
use Nexus\Models\AuthorizeAction;

trait Authorizable
{
	private $abilities = [
		'index'		=> AuthorizeAction::View,
		'show'		=> AuthorizeAction::View,

		'create'	=> AuthorizeAction::Add,
		'store'		=> AuthorizeAction::Add,

		'edit'		=> AuthorizeAction::Edit,
		'update'	=> AuthorizeAction::Edit,
		'restore'	=> AuthorizeAction::Edit,
		
		'destroy'	=> AuthorizeAction::Delete,
	];

	/**
	 * Override of callAction to perform the authorization before
	 *
	 * @param $method
	 * @param $parameters
	 * @return mixed
	 */
	public function callAction($method, $parameters)
	{
		if( $ability = $this->getAbility($method) ) {
			try {
				$this->authorizeForUser(admin(), $ability);
			} catch (AuthorizationException $e) {
				throw new AuthorityException();
			}
		}

		return parent::callAction($method, $parameters);
	}

	public function getAbility($method)
	{
		$routeName = $this->getRouteName();
		$resource = $routeName[0];

		if (strlen($resource) == 0) {
			$resource = request()->route('resource');
		}

		$action = array_get($this->getAbilities(), $method);

		return $action ? $action . '_' . $resource : $method . '_' . $resource;
	}

	private function getRouteName() : array
	{
		$routeArray = explode('.', \Request::route()->getName());

		if (count($routeArray) > 2) {
			$ability = array_pop($routeArray);
			$route = implode('.', $routeArray); 

			return [$route, $ability];
		}

		return $routeArray;
	}

	private function getAbilities()
	{
		return $this->abilities;
	}

	public function setAbilities($abilities)
	{
		$this->abilities = $abilities;
	}
}
