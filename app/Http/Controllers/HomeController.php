<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\IApiService as IApiService;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends Controller
{
	private $twitterAPIService;

	/*
	 * Route: /
	 *
	 * */
	public function __construct(IApiService $apiService) {
		$this->twitterAPIService = $apiService;
	}

	public function Index() {
		return View::make('index');
	}

	/*
	 * Route: /search/{searchQuery}
	 *
	 * */
	public function Search($searchQuery) {
		
		$data = $this->twitterAPIService->Search($searchQuery);
		
		$serializedData = array_map(function ($tweet) {
			return $tweet->jsonSerialize;
		}, $data);
		
		return JsonResponse::create(json_encode($serializedData));
	}

}
