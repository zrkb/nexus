<?php

namespace Nexus\Http\Controllers;

use Nexus\Http\Requests\UpdateProfile;

class ProfileController extends BaseController
{
    public function edit()
    {
        return view('nexus::profile/edit');
    }

    public function update(UpdateProfile $form)
    {
        if ($form->withModel(admin())->persist()) {
            session()->flash('success', 'El registro ha sido modificado exitosamente.');
        } else {
            session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
        }

        return redirect()->route('profile.edit');
    }
}
