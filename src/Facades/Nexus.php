<?php

namespace Pandorga\Nexus\Facades;

use Illuminate\Support\Facades\Facade;

class Nexus extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \Pandorga\Nexus\Nexus::class;
	}
}
