<?php

namespace Nexus\Models;

use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use MediaUploader;
use Nexus\Traits\HasCustomFilters;
use Nexus\Traits\HasPrevNext;
use Nexus\Traits\ResourceModel;
use Plank\Mediable\Media as PlankMedia;

class Media extends PlankMedia
{
    use ResourceModel;
    use HasCustomFilters;
    use HasPrevNext;

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
            view('nexus::misc/media', ['media' => $this])
        );
        // return new HtmlString(
        // 	view('nexus::misc/icon-block', ['media' => $this])
        // );
    }


    /**
     * Format bytes to kb, mb, gb, tb
     *
     * @param  integer $size
     * @param  integer $precision
     * @return integer
     */
     public static function formatBytes($size, $precision = 2)
     {
         if ($size > 0) {
             $size = (int) $size;
             $base = log($size) / log(1024);
             $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

             return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
         } else {
             return $size;
         }
     }

     public static function allowedMimeTypes() : array
     {
         $mimeTypes = [
             config('mediable.aggregate_types.' . PlankMedia::TYPE_PDF . '.mime_types'),
             config('mediable.aggregate_types.' . PlankMedia::TYPE_IMAGE_VECTOR . '.mime_types'),
             config('mediable.aggregate_types.' . PlankMedia::TYPE_IMAGE . '.mime_types'),
         ];

         $mimeTypes = call_user_func_array('array_merge', $mimeTypes);

         return $mimeTypes;
     }

     public static function upload($file, $directory)
     {
         // Configure Uploader
         $uploader = MediaUploader::fromSource($file)
             ->toDirectory($directory)
             ->setAllowedMimeTypes(static::allowedMimeTypes())
             ->setModelClass(self::class);

         // Verify uploaded file
         $uploader->verifyFile();

         // Upload
         $media = $uploader->upload();

         return $media;
     }
}
