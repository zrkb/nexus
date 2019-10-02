<?php

namespace Nexus\Segments;

abstract class Segment
{
    /**
     * The displayable name of the segment.
     *
     * @var string
     */
    public $name;

    /**
     * The underlying model resource instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $resource;

    /**
     * @var bool
     */
    public $default = false;

	/**
	 * Execute query for the segment.
	 * 
	 * @param &$query \Illuminate\Database\Eloquent\Builder
	 * @return void
	 */
	abstract public function apply(&$query);

    /**
     * Get the key for the segment.
     *
     * @return string
     */
    abstract public function key();

    /**
     * CSS Class for active segments.
     * 
     * @return string
     */
	public function class() : string
	{
		return $this->isActive() ? 'badge-primary' : '';
	}

    public function isDefault() : bool
    {
        return $this->default;
    }

	public function isActive() : bool
	{
		$keyExists = request()->has('segment');
		$keyMatch = request('segment') == $this->key();
		$keyExistsAndMatch = $keyExists && $keyMatch;

		if ($keyExistsAndMatch || ($keyExists == false && $this->default)) {
			return true;
		}

		return false;
	}
}
