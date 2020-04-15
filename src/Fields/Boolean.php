<?php

namespace Nexus\Fields;

class Boolean extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'boolean-field';

    /**
     * The field's help text..
     *
     * @var string
     */
    public $helpText;

    /**
     * @var string
     */
    public $trueLabel = 'Sí';

    /**
     * @var string
     */
    public $falseLabel = 'No';

    public function helpText($text)
    {
        $this->helpText = $text;

        return $this;
    }

    public function trueLabel($text)
    {
        $this->trueLabel = $text;

        return $this;
    }

    public function falseLabel($text)
    {
        $this->falseLabel = $text;

        return $this;
    }
}
