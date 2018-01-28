<?php

namespace App\Http\Controllers;

use App\Services\Api\Http\Client as OPApiClient;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $httpClient;

    protected $responseData = [
        'statusCode'    => 200,
        'errors'        => null,
        'message'       => null,
        'results'       => null
    ];

    public function __construct(OPApiClient $httpClient)
    {
    	$this->httpClient = $httpClient;
    }
}
