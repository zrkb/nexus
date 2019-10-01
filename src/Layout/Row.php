<?php

namespace Pandorga\Laramie\Layout;

use Spatie\Html\BaseElement;

class Row extends BaseElement
{
    protected $tag = 'div';

    // /**
    //  * Add a column.
    //  *
    //  * @param int $width
    //  * @param $content
    //  */
    // public function column($width, $content)
    // {
    //     $column = new Column($content, $width);

    //     $this->addColumn($column);
    // }

    // /**
    //  * @param Column $column
    //  */
    // protected function addColumn(Column $column)
    // {
    //     $this->columns[] = $column;
    // }

    // public function render()
    // {
    //     $this->startRow();

    //     foreach ($this->columns as $column) {
    //         $column->render();
    //     }

    //     $this->endRow();
    // }
}
