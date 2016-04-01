<?php
/**
 * Created by PhpStorm.
 * User: RobertLaCagnina
 * Date: 4/1/2016
 * Time: 2:11 PM
 */

namespace App;


interface IApiService {
	public function Search($searchQuery);
}