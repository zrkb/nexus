<?php

namespace Nexus\Fields;

class ID extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text-field';

    /**
     * Create a new field.
     *
     * @param  string|null  $name
     * @param  string|null  $attribute
     * @return void
     */
    public function __construct($name = null, $attribute = null)
    {
        parent::__construct($name ?? 'ID', $attribute);

        $this->onlyOnIndex();
    }
}
