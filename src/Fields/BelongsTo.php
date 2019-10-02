<?php

namespace Nexus\Fields;

class BelongsTo extends Select
{	
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'belongs-to-field';

    /**
     * The field's options.
     *
     * @var array
     */
    protected $options;

    /**
     * The class name of the related resource.
     *
     * @var string
     */
    public $resourceClass;

    /**
     * The URI key of the related resource.
     *
     * @var string
     */
    public $resourceName;

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @return void
     */
    public function __construct($name = null, $attribute = null, $resource = null)
    {
        parent::__construct($name, $attribute);

        $resource = $resource ?? $this->guessResource($name);

        $this->resourceClass = $resource;
        $this->resourceName = $resource::uriKey();
        $this->belongsToRelationship = $this->attribute;

        $this->populateWithRelation();
    }

    /**
     * Populate component with relation data.
     * 
     * @return $this
     */
    public function populateWithRelation()
    {
        $labelAttribute = $this->resourceClass::$title;
        $options = $this->relationItems()->pluck($labelAttribute, 'id');
        
        $this->withOptions($options);

        return $this;
    }

    public function relationItems()
    {
        return $this->resourceClass::$model::all();
    }

    /**
     * Guess the resource class name from the displayable name.
     *
     * @param  string  $name
     * @return string
     */
    public function guessResource($name)
    {
        $results = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 4);

        return str_replace(
            class_basename($results[3]['class']),
            Str::studly(Str::singular($name)),
            $results[3]['class']
        );
    }
}
