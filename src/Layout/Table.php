<?php

namespace Pandorga\Nexus\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Arr;

class Table implements Htmlable, Renderable
{
	/**
	 * Layout view.
	 *
	 * @var String
	 */
	protected $view = 'nexus::layouts/table';

    /**
     * @var Illuminate\Support\Collection
     */
    protected $columns;

    /**
     * @var Illuminate\Support\Collection
     */
    protected $rows;

	public function __construct(Closure $callback = null)
	{
		$this->columns = new Collection();
		$this->rows = new Collection();

		if ($callback instanceof Closure) {
			$callback($this);
		}
	}

    /**
     * Set table rows.
     *
     * @param array $rows
     *
     * @return $this
     */
    public function rows($rows)
    {
    	$this->rows = $rows;

    	return $this;
    }

    public function column(String $field, String $header)
    {
        $column = new Column($field, $header);

    	$this->columns->push($column);

        return $column;
    }

    /**
     * Render the table.
     *
     * @return string
     */
    public function render()
    {
        $vars = [
            'columns'	=> $this->columns,
            'items'		=> $this->rows,
        ];

        return view($this->view, $vars)->render();
    }

	public function __toString()
	{
		return $this->render();
	}

	public function toHtml(): String
	{
		return $this->render();
	}
}
