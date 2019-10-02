<?php

namespace Nexus\Filters;

abstract class Filter
{
	/**
	 * Public name for views.
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * Indicates whether the filter can exclude or ignore
	 * one or more of its options.
	 * 
	 * @var bool
	 */
	public $canExcludeOptions = false;

	/**
	 * Return a new instance of filter.
	 * 
	 * @return Filter
	 */
	public static function make()
	{
		return new static;
	}

	/**
	 * Return filter options.
	 * 
	 * @param &$query \Illuminate\Database\Eloquent\Builder
	 * @param $value mixed
	 * @return \Illuminate\Support\Collection
	 */
	abstract public function apply(&$query, $value);

	/**
	 * Return filter options.
	 * 
	 * @return \Illuminate\Support\Collection
	 */
	abstract public function options();
}
