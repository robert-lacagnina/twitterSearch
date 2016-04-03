<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Http\Exception\HttpResponseException;
use Symfony\Component\HttpFoundation\JsonResponse;

/*@Class
This class encapsulates calling and authenticating with the Twitter API.
It exposes one method, Search which abstracts the search api call and returns an array of tweet objects.
*/
class TwitterAPIService implements IApiService {

	const API_AUTH_URL = 'https://api.twitter.com/oauth2/token';
	const API_URL = 'https://api.twitter.com/1.1/search/tweets.json';

	private $guzzleHttpClient;

	public function __construct(Client $client) {
		$this->guzzleHttpClient = $client;
	}

	public function Search($searchQuery) {

		$apiResults = $this->CallAPI($searchQuery);

		$tweetsArr = [];

		foreach($apiResults['statuses'] as $status) {
			
			$newTweet = new Tweet();
			
			$newTweet->createdTimestamp = strtotime($status['created_at']);
			$newTweet->handle = "@" . $status['user']['screen_name'];
			$newTweet->tweetText = $status['text'];

			array_push($tweetsArr, $newTweet);
		}

		return $tweetsArr;
	}

	private function CallAPI($queryString) {

		$authArr = $this->authenticateAPI();

		$apiResponse = $this->guzzleHttpClient->request('GET', self::API_URL . "?q=$queryString",
			[
				'headers' =>
					[
						'Authorization' => $authArr['token_type'] . ' ' . $authArr['access_token']
					],
				'http_errors' => false
			]
		);

		return json_decode($apiResponse->getBody()->getContents(), true);
	}

	/**
	 * @return mixed
	 */
	private function authenticateAPI()
	{
		$apiKey = env("TWITTER_API_KEY");
		$apiSecret = env("TWITTER_API_SECRET");

		$encodedKey = urlencode($apiKey);

		$bearerTokenCredentials = $encodedKey . ':' . $apiSecret;

		$base64Credentials = base64_encode($bearerTokenCredentials);

		$authResponse = $this->guzzleHttpClient->request(
			'POST',
			self::API_AUTH_URL,
			[
				'headers' =>
					[
						'Authorization' => 'Basic ' . $base64Credentials,
						'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
					],
				'form_params' => ['grant_type' => 'client_credentials'],
				'http_errors' => false
			]
		);

		$authArr = json_decode($authResponse->getBody()->getContents(), true);

		return $authArr;
	}

}