<?php

namespace Pandorga\Laramie\Facades;

use Illuminate\Support\Facades\Facade;

class Laramie extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \Pandorga\Laramie\Laramie::class;
	}
}
