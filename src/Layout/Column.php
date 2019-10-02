<?php

namespace Nexus\Layout;

use Illuminate\Contracts\Support\Renderable;

class Column implements Renderable
{
	/**
	 * Column field
	 *
	 * @var String
	 */
	public $field;

	/**
	 * Column header
	 *
	 * @var String
	 */
	public $header;

	/**
	 * Field Initials
	 *
	 * @var String
	 */
	public $initials = 'NN';

	/**
	 * Make column linkable to the detail
	 *
	 * @var Bool
	 */
	protected $linkable = false;

	public function __construct(String $field, String $header)
	{
		$this->field = $field;
		$this->header = $header;
	}

	/**
	 * Mark this column as linkable.
	 *
	 * @return Column
	 */
	public function linkable()
	{
		$this->linkable = true;

		return $this;
	}

	public function isLinkable() : Bool
	{
		return $this->linkable;
	}

	public function render()
	{
		return $this->field;
	}
}
