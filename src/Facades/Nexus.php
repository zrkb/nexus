<?php

namespace Nexus\Facades;

use Illuminate\Support\Facades\Facade;

class Nexus extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \Nexus\Nexus::class;
	}
}
