<?php

namespace Nexus\Traits;

trait HasPrevNext
{
	public function next()
	{
		return static::where($this->getKeyName(), '>', $this->getKey())
			->orderBy($this->getKeyName(), 'asc')->first();
	}

	public function prev()
	{
		return static::where($this->getKeyName(), '<', $this->getKey())
			->orderBy($this->getKeyName(), 'desc')->first();
	}
}
