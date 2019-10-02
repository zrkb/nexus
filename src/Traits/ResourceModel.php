<?php

namespace Nexus\Traits;

use Spatie\Activitylog\Traits\LogsActivity;

trait ResourceModel
{
	use LogsActivity;

	protected static $logAttributes = ['*'];
	protected static $logAttributesToIgnore = [];
	protected static $logOnlyDirty = true;

    public function shouldLogOnlyDirty() : bool
    {
        return static::$logOnlyDirty;
    }

    public function getLogAttributes()
    {
        return static::$logAttributes;
    }

    public function getLogAttributesToIgnore()
    {
        return static::$logAttributesToIgnore;
    }

	/**
	 * Check if model has SoftDelete methods.
	 * @return bool
	 */
	public function hasSoftDelete() : bool
	{
		return method_exists($this, 'trashed');
	}

	/**
	 * Check if model will hard delete.
	 * @return bool
	 */
	public function willForceDelete() : bool
	{
		return $this->hasSoftDelete() == false || ($this->hasSoftDelete() && $this->trashed());
	}
}
