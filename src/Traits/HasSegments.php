<?php

namespace Nexus\Traits;

use Nexus\Exceptions\MissingFilterException;
use Nexus\Segments\Segment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait HasSegments
{
	/**
	 * Return a segmented query.
	 * 
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param \Illuminate\Http\Request $request
	 */
	public function scopeSegmentBy(Builder $query, Request $request = null)
	{
		$request = $request ?? request();
		$segmentKey = $request->get('segment');
		$segments = $query->getModel()->segments();

		collect($segments)->each(function (Segment $instance) use ($segmentKey, $query) {
			if (
				$instance->key() == $segmentKey ||
				$segmentKey == null && $instance->isDefault()
			) {
				$instance->apply($query);
			}
		});

		return $query;
	}
}
