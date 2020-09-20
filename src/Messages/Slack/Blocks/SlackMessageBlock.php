<?php

namespace Illuminate\Notifications\Messages\Slack\Blocks;

use Illuminate\Notifications\Messages\Slack\SlackMessagePayload;

class SlackMessageBlock extends SlackMessagePayload
{
	/**
	 * Create a new Slack Message Block instance.
	 *
	 * @param  string  $type
	 * @param  string  $block_id
	 * @return void
	 */
	public function __construct($type, $block_id = null)
	{
		$this->payload['type'] = $type;

		if (!is_null($block_id)) {
			$this->payload['block_id'] = $block_id;
		}
	}

	/**
	 * Set the type of the block.
	 *
	 * @param  string|null $type
	 * @return $this
	 */
	public function type($type)
	{
		if (is_null($type)) {
			unset($this->payload['type']);
		} else {
			$this->payload['type'] = $type;
		}

		return $this;
	}

	/**
	 * Set the id of the block.
	 *
	 * @param  string|null $block_id
	 * @return $this
	 */
	public function blockId($block_id)
	{
		if (is_null($block_id)) {
			unset($this->payload['block_id']);
		} else {
			$this->payload['block_id'] = $block_id;
		}

		return $this;
	}
}