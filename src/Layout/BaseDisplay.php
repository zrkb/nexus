<?php

namespace Pandorga\Nexus\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

abstract class BaseDisplay implements Htmlable, Renderable
{
	/**
	 * Content header.
	 *
	 * @var string
	 */
	protected $header = '';

	/**
	 * Content description.
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * @var items
	 */
	protected $items;

	public function __construct(Closure $callback = null)
	{
		$this->items = new Collection();

		if ($callback instanceof Closure) {
			$callback($this);
		}
	}

	public function header($header = '')
	{
		$this->header = $header;

		return $this;
	}

	public function description($description = '')
	{
		$this->description = $description;

		return $this;
	}

	abstract public function item($content);

	protected function addItem($item)
	{
		$this->items->push($item);
	}

	public function build()
	{
        $items = $this->items->map(function ($item): String {
            if ($item instanceof \Spatie\Html\HtmlElement) {
                return $item->render();
            }

            if (is_string($item)) {
                return $item;
            }

            if (is_null($item)) {
                return '';
            }

            throw new Exception('Invalid HTML content');
        })->implode('');

        return new HtmlString($items);
	}

	public function render()
	{
		$items = [
			'title'      => $this->header,
			'pageTitle' => $this->description,
			'slot'     => $this->build(),
		];

		return view('nexus::layouts/card', $items)->render();
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
