<?php

namespace Pandorga\Nexus\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Pandorga\Nexus\Traits\HasResource;

class BaseResourceController extends BaseController
{
    use HasResource;

    protected $resource;

    public function index()
    {
        $items = $this->getModel()::all();
        $resource = new $this->resource($items);

        return view($resource->viewForIndex, compact('items', 'resource'));
    }

    public function show($id)
    {
        $item = $this->getModel()::findOrFail($id);
        $resource = new $this->resource($item);

        return view($resource->viewForDetail, compact('item', 'resource'));
    }

    public function create()
    {
        $item = $this->resource::newModel();
        $resource = new $this->resource($item);

        return view($resource->viewForCreation, compact('item', 'resource'));
    }

    public function store(Request $request)
    {
        $model = $this->resource::newModel();
        $resource = new $this->resource($model);

        $this->validate($request, $resource->createRules());

        // Remove unexistent data from rules
        $data = array_intersect_key($request->all(), array_flip($model->getFillable()));

        $item = $model::create($data);

        if ($item) {
            session()->flash('success', 'El registro ha sido creado exitosamente.');
        } else {
            session()->flash('error', 'Error al crear el registro. Consulte con el administrador.');
        }

        return redirect(resource('index'));
    }

    public function edit(Request $request, $id)
    {
        $item = $this->getModel()::findOrFail($id);
        $resource = new $this->resource($item);

        return view($resource->viewForUpdate, compact('item', 'resource'));
    }

    public function update(Request $request, $id)
    {
        $model = $this->resource::newModel();
        $resource = new $this->resource($model);
        $item = $model::findOrFail($id);

        $this->validate($request, $resource->updateRules($id));

        // Remove unexistent data from rules
        $data = array_intersect_key($request->all(), array_flip($model->getFillable()));

        if ($item->update($data)) {
            session()->flash('success', 'El registro ha sido modificado exitosamente.');
        } else {
            session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
        }

        return redirect(resource('show', $id));
    }
}
