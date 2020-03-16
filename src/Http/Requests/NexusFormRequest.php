<?php

namespace Nexus\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

abstract class NexusFormRequest extends FormRequest
{
	private $model;

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

    public function model()
    {
        return $this->model;
	}

    /**
     * Set model
     *
     * @return self
     */
	public function withModel(Model $model)
	{
		$this->model = $model;

		return $this;
	}

    /**
     * Persist the request to the repository.
     *
     * @return mixed
     */
    abstract public function persist();
}
