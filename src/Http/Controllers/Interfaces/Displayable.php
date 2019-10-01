<?php

namespace Pandorga\Laramie\Http\Controllers\Interfaces;

trait Displayable
{
    protected $title = 'Blank Page';
    protected $label = 'Items';

    public function getItems()
    {
        return $this->getRepo()->getAll();
    }

    public function getTitle() : String
    {
        return $this->title;
    }

    public function getLabel() : String
    {
        return $this->label;
    }
}
