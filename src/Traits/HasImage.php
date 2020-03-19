<?php

namespace Nexus\Traits;

use Nexus\Models\Media;
use Illuminate\Http\Request;
use Plank\Mediable\Mediable;
use Illuminate\Support\HtmlString;

trait HasImage
{
    use Mediable;

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
}
