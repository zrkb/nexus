<?php

namespace Nexus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class NexusFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Persist the request to the repository.
     * 
     * @return mixed
     */
    abstract public function persist();
}
