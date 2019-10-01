<?php

namespace Pandorga\Laramie\Fields;

class Textarea extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'textarea-field';

    /**
     * The meta data for the element.
     *
     * @var array
     */
    public $meta = [
        'extraAttributes' => [
            'class' => 'form-control',
        ],
    ];

    /**
     * Create a new field.
     *
     * @param  string|null  $name
     * @param  string|null  $attribute
     * @return void
     */
    public function __construct($name = null, $attribute = null)
    {
        parent::__construct($name, $attribute);

        $this->onlyOnForms();
    }
}
