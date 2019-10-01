<?php

namespace Pandorga\Laramie\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Pandorga\Laramie\Models\Authenticatable;
use Pandorga\Laramie\Presenters\AdminPresenter;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
	use Notifiable, HasRoles, SoftDeletes, AdminPresenter;

	protected static $ignoreChangedAttributes = ['remember_token'];

	protected $guard_name = 'admin';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'password',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

    public function getLogAttributesToIgnore()
    {
        return ['remember_token'];
    }
}
