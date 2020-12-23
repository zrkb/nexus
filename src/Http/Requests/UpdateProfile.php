<?php

namespace Nexus\Http\Requests;

use Illuminate\Support\Facades\DB;
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
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|string|email|unique:admins,email,' . admin()->id,
            'password'  => 'sometimes|nullable|string|min:6|max:255',
        ];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation()
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
