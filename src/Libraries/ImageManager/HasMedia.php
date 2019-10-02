<?php

namespace Pandorga\Nexus\Libraries\ImageManager;

use Illuminate\Support\HtmlString;
use MediaUploader;
use Pandorga\Nexus\Models\Media;
use Plank\Mediable\Mediable;

trait HasMedia
{
	use Mediable;
	
	public $savedMedia;

	public function uploadMediaFromRequest(string $name)
	{
		// Configure Uploader
		$uploader = MediaUploader::fromSource(request()->file($name))
			->toDirectory($this->directory())
			->setAllowedMimeTypes($this->allowedMimeTypes())
			->setModelClass(Media::class);

		// Verify uploaded file
		$uploader->verifyFile();

		// Upload
		$media = $uploader->upload();

		$this->setSavedMedia($media);

		return $this;
	}

	public function updateMediaFromRequest(string $name, string $collection, bool $deleteOldFile = false)
	{
		if ($deleteOldFile == true && $this->hasMedia($collection)) {
			$this->getMedia($collection)->delete();
		}

		return $this->uploadMediaFromRequest($name)
					->toMediaCollection($collection);
	}

	public function toMediaCollection(string $collection)
	{
		$this->attachMedia($this->getSavedMedia(), $collection);

		return $this;
	}

	public function renderMedia($collection = null)
	{
		return $this->firstMedia($collection)->render();
	}

	/**
	 * @param mixed $media
	 *
	 * @return self
	 */
	public function setSavedMedia($savedMedia)
	{
		$this->savedMedia = $savedMedia;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSavedMedia()
	{
		return $this->savedMedia;
	}

	public function detachAndDeleteMedia($collection)
	{
		$media = $this->firstMedia($collection);
		$this->detachMedia($media);
		$media->delete();
	}

	/**
	 * @return mixed
	 */
	public function directory()
	{
		return 'uploads/files';
	}

	public function allowedMimeTypes() : array
	{
		$mimeTypes = [
			config('mediable.aggregate_types.' . Media::TYPE_PDF . '.mime_types'),
			config('mediable.aggregate_types.' . Media::TYPE_IMAGE_VECTOR . '.mime_types'),
			config('mediable.aggregate_types.' . Media::TYPE_IMAGE . '.mime_types'),
		];

		$mimeTypes = call_user_func_array('array_merge', $mimeTypes);

		return $mimeTypes;
	}
}
