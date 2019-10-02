<?php

namespace Pandorga\Nexus\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class Detail implements Htmlable, Renderable
{
	/**
	 * Layout view.
	 *
	 * @var string
	 */
	protected $view = 'nexus::crud/show';

	/**
	 * Content title.
	 *
	 * @var \Illuminate\Support\Collection
	 */
	protected $title = '';

	/**
	 * @var \Illuminate\Support\Collection
	 */
	protected $rows;

	/**
	 * @var \Illuminate\Support\Collection
	 */
	protected $fields;
	
	protected $item = '';

	public function __construct(Closure $callback = null)
	{
		$this->rows = new Collection();
		$this->fields = new Collection();

		if ($callback instanceof Closure) {
			$callback($this);
		}
	}

	public function title($title = '')
	{
		$this->title = $title;

		return $this;
	}

	public function body($content)
	{
		return $this->row($content);
	}

	public function row($content)
	{
		if ($content instanceof Closure) {
			$row = new Row();
			call_user_func($content, $row);
			$this->addRow($row);
		} else {
			$this->addRow((new Row())->html($content));
		}

		return $this;
	}

	protected function addRow(Row $row)
	{
		$this->rows->push($row);
	}

	public function field(String $name, String $label)
	{
		$field = new Field($name, $label);

		$this->fields->push($field);

		return $field;
	}

	public function item($item)
	{
		$this->item = $item;
	}

	public function build()
	{
        $rows = $this->rows->map(function ($row): String {
            if ($row instanceof \Spatie\Html\HtmlElement) {
                return $row->render();
            }

            if (is_null($row)) {
                return '';
            }

            if (is_string($row)) {
                return $row;
            }

            throw new Exception('Invalid HTML content');
        })->implode('');

        return new HtmlString($rows);
	}

	public function render()
	{
		$vars = [
			'title'		=> $this->title,
			'item'		=> $this->item,
			'fields'	=> $this->fields,
			'slot'		=> $this->build(),
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
