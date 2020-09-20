<?php

namespace Illuminate\Notifications\Messages\Slack\Blocks;

class SlackMessageBlockContext extends SlackMessageBlock
{
	/**
	 * Create a new Context Block instance.
	 *
	 * @param  string|null  $block_id
	 * @return void
	 */
	public function __construct($block_id = null)
	{
		parent::__construct('context', $block_id);
	}

	/**
	 * Set an array of image elements and text objects.
	 * Maximum number of items is 10.
	 *
	 * @param  array|null  $elements
	 * @return $this
	 */
	public function setElements(array $elements)
	{
		if (is_null($elements)) {
			unset($this->payload['elements']);
		} else {
			$this->payload['elements'] = $elements;
		}

		return $this;
	}

	/**
	 * Add an element object.
	 *
	 * @param  string  $type
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addElement(string $type, Closure $callback)
	{
		$element = Elements\SlackMessageElement::create($type);

		$callback($element);

		$this->payload['elements'][] = $element->toArray();

		return $this;
	}
}