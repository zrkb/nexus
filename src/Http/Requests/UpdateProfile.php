<?php

namespace Nexus\Http\Requests;

use DB;
use Nexus\Http\Requests\NexusFormRequest;

class UpdateProfile extends NexusFormRequest
{
    /**
     * Persist the request to the repository.
     *
     * @return mixed
     */
    public function persist()
    {
        return DB::transaction(function () {
            $item = $this->model();

            return $item->update(
                $this->only(
                    $this->has('password') && $this->password ?
                        $this->profileDataWithPassword() :
                        $this->profileData()
                )
            );
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email|unique:admins,email,' . admin()->id,
            'password'  => 'sometimes|nullable|min:6',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Encrypt password
        if ($this->has('password') && $this->password) {
            $this->merge(['password' => bcrypt($this->password)]);
        }
    }

    public function profileData()
    {
        return [
            'firstname',
            'lastname',
            'email',
        ];
    }

    public function profileDataWithPassword()
    {
        return array_merge($this->profileData(), ['password']);
    }
}
