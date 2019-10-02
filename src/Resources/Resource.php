<?php

namespace Nexus\Resources;

use Illuminate\Support\Str;
use Nexus\Exceptions\MissingModelException;
use Nexus\Traits\ResourceFields;

abstract class Resource
{
    use ResourceFields;
    
    /**
     * The underlying model resource instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $resource;

    /**
     * @var string
     */
    public $viewForIndex = 'nexus::resources/index';

    /**
     * @var string
     */
    public $viewForDetail = 'nexus::resources/show';

    /**
     * @var string
     */
    public $viewForCreation = 'nexus::resources/create';

    /**
     * @var string
     */
    public $viewForUpdate = 'nexus::resources/edit';

    /**
     * @var string
     */
    public $viewForForm = 'nexus::resources/form';

    /**
     * Create a new resource instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $resource
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get the underlying model instance for the resource.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->resource;
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return Str::plural(class_basename(get_called_class()));
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return Str::singular(static::label());
    }

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return $this->model()->getAttribute(static::$title);
    }

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string|null
     */
    public function subtitle()
    {
        //
    }

    /**
     * Get a fresh instance of the model represented by the resource.
     *
     * @return mixed
     */
    public static function newModel(...$args)
    {
        $model = static::$model;

        return new $model(...$args);
    }

    /**
     * Get the URI key for the resource.
     *
     * @return string
     */
    public static function uriKey()
    {
        return Str::plural(Str::kebab(class_basename(get_called_class())));
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function fields()
    {
        return [];
    }

    public function createRules() : array
    {
        return [];
    }

    public function updateRules($resourceId) : array
    {
        return [];
    }
}
