<?php

namespace lister169126\SlackWebhookMessage;

class SlackMessage
{

	/** @var string */
	private $webhookUrl;


	public function __construct($webhookUrl)
	{
		$this->webhookUrl = $webhookUrl;
	}


	/**
	 * @param $message
	 * @return string
	 */
	public function sendMessage($message)
	{
		$c = curl_init($this->webhookUrl);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_HEADER, ['Content-type: application/json']);
		curl_setopt($c, CURLOPT_POSTFIELDS, json_encode([
			'blocks' => [[
				'type' => 'section',
				'text' => [
					'type' => 'plain_text',
					'text' => $message,
				],
			]],
		]));
		$response = curl_exec($c);
		curl_close($c);

		return $response;
	}
}
