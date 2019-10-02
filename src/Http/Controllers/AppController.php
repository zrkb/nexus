<?php

namespace Pandorga\Nexus\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
	public function index()
	{
		return view('nexus::app/index');
	}
}
