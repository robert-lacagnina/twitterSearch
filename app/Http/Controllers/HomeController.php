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

	public function __construct(IApiService $apiService) {
		$this->twitterAPIService = $apiService;
	}

	public function index() {
		return View::make('index');
	}

	public function search() {
		
		$data = $this->twitterAPIService->Search("donald trump");

		//return JsonResponse::create($data);
	}

}
