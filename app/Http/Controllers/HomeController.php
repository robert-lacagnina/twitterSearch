<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\IApiService as IApiService;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends Controller {
	private $twitterAPIService;

	/*
	 * Route: GET /
	 *
	 * */
	public function __construct(IApiService $apiService) {
		$this->twitterAPIService = $apiService;
	}

	public function Index() {
		return View::make('index');
	}

	/*
	 * Route: GET /search
	 *
	 * */
	public function Search(Request $request) {

		$searchQuery = $request->input('q');

		$data = $this->twitterAPIService->Search($searchQuery);

		//reverse chronological order
		usort($data, function($a, $b) {
			if($a->createdTimestamp == $b->createdTimestamp)
				return 0;

			return $a->createdTimestamp > $b->createdTimestamp ? -1 : 1;
		});

		$serializedData = array_map(function ($tweet) {
			return $tweet->jsonSerialize();
		}, $data);

		$tweetsResponse = ['tweets' => $serializedData];

		return JsonResponse::create($tweetsResponse);
	}
}
