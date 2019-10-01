<?php

namespace Pandorga\Laramie\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use MediaUploader;
use Pandorga\Laramie\Traits\HasCustomFilters;
use Pandorga\Laramie\Traits\HasPrevNext;
use Pandorga\Laramie\Traits\ResourceModel;
use Plank\Mediable\Media as PlankMedia;
use Plank\Mediable\SourceAdapters\SourceAdapterInterface;

class Media extends PlankMedia
{
	use ResourceModel, HasCustomFilters, HasPrevNext;
 
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'disk',
		'directory',
		'filename',
		'extension',
		'mime_type',
		'size',
	];

    /**
     * Get the absolute URL to the media file.
     * @throws \Plank\Mediable\Exceptions\MediaUrlException If media's disk is not publicly accessible
     * @return string
     */
    public function getPublicPath()
    {
        return $this->getUrlGenerator()->getPublicPath();
    }

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	public function getDimensions()
	{
		list($width, $height) = getimagesize($this->getAbsolutePath());

		return "{$width}x{$height}";
	}

	public function getSize()
	{
		return format_bytes($this->size);
	}

	public function isImage() : bool
	{
		return $this->aggregate_type == PlankMedia::TYPE_IMAGE;
	}

	public function render($collection = null)
	{
		return new HtmlString(
			view('laramie::misc/media', ['media' => $this])
		);
		// return new HtmlString(
		// 	view('laramie::misc/icon-block', ['media' => $this])
		// );
	}

    public static function updateMedia(Request $request, Media $media)
    {
    	$media->delete();

		return static::upload($request);
    }
}
