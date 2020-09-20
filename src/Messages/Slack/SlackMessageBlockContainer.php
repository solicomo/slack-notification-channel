<?php

namespace Illuminate\Notifications\Messages\Slack;

use Closure;

class SlackMessageBlockContainer extends SlackMessagePayload
{
	/**
	 * Set blocks for the message.
	 *
	 * @param  array  $blocks
	 * @return $this
	 */
	public function setBlocks(array $blocks)
	{
		$this->payload['blocks'] = $blocks;

		return $this;
	}

	/**
	 * Add a Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlock(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlock;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add an Actions Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockActions(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockActions;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add a Context Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockContext(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockContext;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add a Divider Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockDivider(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockDivider;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add a File Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockFile(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockFile;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add a Header Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockHeader(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockHeader;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add an Image Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockImage(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockImage;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add an Input Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockInput(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockInput;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}

	/**
	 * Add a Section Block for the message.
	 *
	 * @param  \Closure  $callback
	 * @return $this
	 */
	public function addBlockSection(Closure $callback)
	{
		$block = new Blocks\SlackMessageBlockSection;

		$callback($block);

		$this->payload['blocks'][] = $block->toArray();

		return $this;
	}
}