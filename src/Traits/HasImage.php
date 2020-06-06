<?php

namespace Nexus\Traits;

use Nexus\Models\Media;
use Illuminate\Http\Request;
use Plank\Mediable\Mediable;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Model;

trait HasImage
{
    use Mediable;

    public static function bootHasImage()
    {
        static::saving(function (Model $model) {
            if ($model->syncImageOnSave()) {
                if ($model->exists == false) {
                    $model->attachImageIfExists();
                }

                $model->syncImageIfExists();
            }
        });
    }

    public function attachImageIfExists(Request $request = null)
    {
        $request = $request ?? request();

        if ($imageFile = $request->file('image')) {
            $this->attachImage($imageFile);
        }
    }

    public function syncImageIfExists(Request $request = null)
    {
        $request = $request ?? request();

        if ($request->has('remove') && $this->image) {
            $this->image->delete();
        }

        if ($file = $request->file('image')) {
            $this->attachImage($file);
        }
    }

    public function getImageAttribute()
    {
        return $this->firstMedia('image');
    }

    public function attachImage($file)
    {
        if ($this->image) $this->image->delete();

        $this->attachMedia(Media::upload($file, $this->destinationPath()), 'image');
    }

    public function renderImage($placeholder = true, $size = null)
    {
        if ($this->image) {
            return new HtmlString(
                view('nexus::components/thumbnail', ['media' => $this->image, 'size' => $size])
            );
        }

        return $placeholder ? 'no-img' : '';
    }

    public function updateImage($request)
    {
        if ($request->remove && $this->image) {
            $this->image->delete();
        }

        if ($file = $request->file('image')) {
            $this->attachImage($file);
        }

        return $this;
    }

    /**
     * Set destination path
     *
     * @return string
     */
    public function destinationPath()
    {
        return 'uploads';
    }

    public function syncImageOnSave()
    {
        return true;
    }
}
