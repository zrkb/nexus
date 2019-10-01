<?php

namespace Pandorga\Laramie\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
	public function index()
	{
		return view('laramie::app/index');
	}
}
