<?php

namespace Pandorga\Nexus\Fields;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class Field extends FieldElement
{
    /**
     * The displayable name of the field.
     *
     * @var string
     */
    public $name;

    /**
     * The attribute / column name of the field.
     *
     * @var string
     */
    public $attribute;

    /**
     * The field's resolved value.
     *
     * @var mixed
     */
    public $value;

    /**
     * The callback to be used to resolve the field's display value.
     *
     * @var \Closure
     */
    public $displayCallback;

    /**
     * The callback to be used to resolve the field's value.
     *
     * @var \Closure
     */
    public $resolveCallback;

    /**
     * The validation rules for creation and updates.
     *
     * @var array
     */
    public $rules = [];

    /**
     * The validation rules for creation.
     *
     * @var array
     */
    public $creationRules = [];

    /**
     * The validation rules for updates.
     *
     * @var array
     */
    public $updateRules = [];

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @return void
     */
    public function __construct($name = null, $attribute = null)
    {
        $this->name = $name ?? class_basename(get_called_class());
        $this->attribute = $attribute ?? str_replace(' ', '_', Str::lower($name));
    }

    /**
     * Define the callback that should be used to resolve the field's value.
     *
     * @param  callable  $displayCallback
     * @return $this
     */
    public function displayUsing(callable $displayCallback)
    {
        $this->displayCallback = $displayCallback;

        return $this;
    }

    /**
     * Define the callback that should be used to resolve the field's value.
     *
     * @param  callable  $resolveCallback
     * @return $this
     */
    public function resolveUsing(callable $resolveCallback)
    {
        $this->resolveCallback = $resolveCallback;

        return $this;
    }

    /**
     * Resolve the field's value for display.
     *
     * @param  mixed  $resource
     * @param  string|null  $attribute
     * @return void
     */
    public function resolveForDisplay($item, $value)
    {
        $attribute = $attribute ?? $this->attribute;
        $value = htmlentities($value);

        if (! $this->displayCallback) {
            return $value;
        } elseif (is_callable($this->displayCallback)) {
            return call_user_func($this->displayCallback, $item, $value);
        }
    }

    public function renderForIndex($item, $resource)
    {
        $value = $item->getAttribute($this->attribute);

        return view("nexus::fields/{$this->component}/index")->with([
            'field' => $this,
            'item' => $item,
            'value' => $this->resolveForDisplay($item, $value),
            'resource' => $resource,
        ]);
    }

    public function renderForForm($item, $resource)
    {
        return view("nexus::fields/{$this->component}/form")->with([
            'field' => $this,
            'item' => $item,
            'value' => $item->getAttribute($this->attribute),
            'resource' => $resource,
        ]);
    }

    public function renderForShow($item)
    {
        return view("nexus::fields/{$this->component}/show")->with([
            'field' => $this,
            'item' => $item,
            'value' => $item->getAttribute($this->attribute),
        ]);
    }

    public function withExtraAttributes(array $attributes)
    {
        return $this->withMeta([
            'extraAttributes' => array_merge($this->extraAttributes(), $attributes)
        ]);
    }

    public function extraAttributes()
    {
        return $this->meta()['extraAttributes'] ?? [];
    }
}
