<?php

namespace Pandorga\Laramie\Fields;

class Select extends Field
{	
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'select-field';

    /**
     * The field's options.
     *
     * @var array
     */
	protected $options;

    /**
     * Set the options for the select menu.
     *
     * @param  array  $options
     * @return $this
     */
    public function withOptions($options)
    {
    	$this->options = $options;

    	return $this;
    }

    public function options()
    {
    	return $this->options;
    }
}
