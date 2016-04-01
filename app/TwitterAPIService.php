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

	private $guzzleHttp;

	public function __construct(Client $client) {
		$this->guzzleHttp = $client;
	}

	public function Search( $searchQuery ) {



		return array();
	}

	private function CallAPI() {
		//authenticate with Twitter API
		$this->guzzleHttp->get();



		$apiResponse = $this->guzzleHttp->get(self::API_URL . "arguments go here...")->send();

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