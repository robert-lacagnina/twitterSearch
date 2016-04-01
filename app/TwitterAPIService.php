<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Http\Exception\HttpResponseException;

/*@Class
This class takes in a string search query and returns an array of tweet objects.
*/
class TwitterAPIService implements IApiService {

	const API_AUTH_URL = 'https://api.twitter.com/oauth2/token';
	const API_URL = 'https://api.twitter.com/1.1/search/tweets.json';

	private $guzzleHttpClient;

	public function __construct(Client $client) {
		$this->guzzleHttpClient = $client;
	}

	public function Search( $searchQuery ) {


		//return an array of tweet objects
		return array();
	}

	private function CallAPI() {

		$apiKey = env("TWITTER_API_KEY");
		$apiSecret = env("TWITTER_API_SECRET");

		$encodedKey = urlencode($apiKey);

		$bearerTokenCredentials = $encodedKey . ":" . $apiSecret;

		$base64Credentials = base64_encode($bearerTokenCredentials);


		//authenticate with Twitter API
		$this->guzzleHttpClient->post(
			self::API_AUTH_URL,
			array("Authorization" => $base64Credentials),
			"grant_type=client_credentials"
			)->send();


		$apiResponse = $this->guzzleHttpClient->get(self::API_URL . "arguments go here...")->send();

		if($apiResponse->isSucessful) {
			$responseArray = $apiResponse->json();

			foreach($responseArray as $tweet) {
				//parse api response array and create object
			}
		}
		else {
			throw new HttpResponseException( $apiResponse );
		}
	}

}