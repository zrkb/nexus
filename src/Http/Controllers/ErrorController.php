<?php

namespace Pandorga\Laramie\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
	public function show(Request $request)
	{
		$error = $request->route('error');

		return view('laramie::errors/' . $error);
	}
}
