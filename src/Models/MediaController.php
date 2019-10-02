<?php

namespace App\Http\Controllers;

use Pandorga\Nexus\Libraries\ImageManager\ImageUploader;
use Pandorga\Nexus\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\SourceAdapters\SourceAdapterInterface;
use MediaUploader;

class FilesController extends ResourceController
{
	protected $model = \App\Models\File::class;

	public function index()
	{
		$files = File::all();

		return view('files/index', compact('files'));
	}

	public function show($id)
	{
		$file = File::find($id);
		
		return view('files/show', compact('file'));
	}

	public function create()
	{
		return view('files/create');
	}

	public function store(Request $request)
	{
		$creationRules = $this->creationRules();
		$this->validate($request, $creationRules);
		
		try{
			$media = File::upload($request);
			session()->flash('success', 'El registro ha sido creado exitosamente.');

			return redirect(resource('index'));
        } catch(MediaUploadException $e) {
			session()->flash('danger', "No se pudo levantar el archivo: {$e->getMessage()}");

			return redirect(resource('create'));
        }
	}

	public function edit($id)
	{
		$file = File::find($id);

		return view('files/edit', compact('file'));
	}

	public function update(Request $request, $id)
	{
		$file = File::find($id);

		$updateRules = $this->updateRules($file->id);
		$this->validate($request, $updateRules);
		
		try {
			File::updateMedia($request, $file);
			session()->flash('success', 'El registro ha sido modificado exitosamente.');

			return redirect(resource('index'));
        } catch(MediaUploadException $e) {
			session()->flash('error', "Error al modificar el registro: {$e->getMessage()}");

			return redirect(resource('edit'));
        }

		return redirect(resource('index'));
	}

	public function destroy($id)
	{
		$file = File::find($id);

		if ($file->delete()) {
			session()->flash('success', 'El registro se ha eliminado exitosamente de la Base de Datos');
		} else {
			session()->flash('danger', 'No se pudo eliminar el registro. Por favor comuníquese con el administrador.');
		}

		return redirect(resource('index'));
	}

	private function creationRules() : array
	{
		return [
			'name'		=> 'sometimes|nullable|unique:images,name',
			'file'		=> 'required',
		];
	}

	private function updateRules($id) : array
	{
		return [
			'name'		=> 'sometimes|nullable|unique:images,name,' . $id,
			'file'		=> 'sometimes|nullable',
		];
	}

	protected function updateImage(Request $request, Image $image)
	{
		if ($request->has('image')) {
			$this->validate($request, [
				'image'	=> ImageUploader::formRules(),
			]);

			return ImageUploader::update($request, $image);
		}

		return $image->update(['name' => $request->name]);
	}
}
