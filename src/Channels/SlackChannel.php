<?php

namespace Illuminate\Notifications\Channels;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class SlackWebhookChannel
{
	/**
	 * The HTTP client instance.
	 *
	 * @var \GuzzleHttp\Client
	 */
	protected $http;

	/**
	 * Create a new Slack channel instance.
	 *
	 * @param  \GuzzleHttp\Client  $http
	 * @return void
	 */
	public function __construct(HttpClient $http)
	{
		$this->http = $http;
	}
	
	/**
	 * Send the given notification.
	 *
	 * @param  mixed  $notifiable
	 * @param  \Illuminate\Notifications\Notification  $notification
	 * @return \Psr\Http\Message\ResponseInterface|null
	 */
	public function send($notifiable, Notification $notification)
	{
		$incomingWebhook = $notifiable->routeNotificationFor('slack', $notification);

		if (!empty($incomingWebhook)) {
			return $this->http->post($incomingWebhook, $this->buildJsonPayload(
				$notification->toSlack($notifiable), false
			));
		}

		$url = 'https://slack.com/api/chat.postMessage';

		return $this->http->post($incomingWebhook, $this->buildJsonPayload(
			$notification->toSlack($notifiable), true
		));
	}

	/**
	 * Build up a JSON payload for the Slack webhook.
	 *
	 * @param  Illuminate\Notifications\Messages\SlackMessage  $message
	 * @param  bool $auth
	 * @return array
	 */
	protected function buildJsonPayload(SlackMessage $message, $auth = false)
	{
		$options = array_merge(['json' => $message->toArray()], $message->http);

		if (!$auth) {
			return $options;
		}

		if (array_key_exists('headers', $options) &&
			is_array($options['headers']) &&
			array_key_exists('Authorization', $options['headers'] &&
			!empty($options['headers']['Authorization']))
		) {
			return $options;
		}

		if (!array_key_exists('headers', $options) || !is_array($options['headers'])) {
			$options['headers'] = [];
		}

		$options['headers']['Authorization'] = 'Bearer ' . config('services.slack.token');

		return $options;
	}
}