<?php

namespace Nexus\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait ResourceModel
{
	use LogsActivity;

    /**
     * Get the options for the activitylog.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
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
