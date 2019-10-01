<?php

namespace Pandorga\Laramie\Http\Controllers;

use Pandorga\Laramie\Models\Activity;

class ActivitiesController extends BaseController
{
	public function index()
	{
		$activities = Activity::latest()->get();

		return view('laramie::activities/index', compact('activities'));
	}
}
