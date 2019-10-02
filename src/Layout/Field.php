<?php

namespace Nexus\Layout;

use Illuminate\Contracts\Support\Renderable;

class Field implements Renderable
{
	/**
	 * Field name
	 *
	 * @var String
	 */
	public $name;

	/**
	 * Field label
	 *
	 * @var String
	 */
	public $label;

	public function __construct(String $name, String $label)
	{
		$this->name = $name;
		$this->label = $label;
	}

	public function render()
	{
		return $this->name;
	}
}
