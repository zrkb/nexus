<?php

namespace Nexus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'lastname' => 'required|max:255',
			'lastname' => 'required|max:255',
			'email' => 'required|unique:users|email|max:255',
			'password' => 'required',
		];
	}
}
