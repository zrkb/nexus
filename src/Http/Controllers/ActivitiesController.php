<?php

namespace Pandorga\Nexus\Http\Controllers;

use Pandorga\Nexus\Models\Activity;

class ActivitiesController extends BaseController
{
	public function index()
	{
		$activities = Activity::latest()->get();

		return view('nexus::activities/index', compact('activities'));
	}
}
