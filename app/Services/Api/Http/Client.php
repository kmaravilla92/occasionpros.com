<?php

namespace App\Services\Api\Http;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Client extends HttpClient
{

	protected $httpClient;

	public function __construct($options = [])
	{
		$this->initializeHttpClient($options);
		parent::__construct();
	}

	public function initializeHttpClient($options = [])
	{
		$httpClient = new HttpClient($options);

		$this->setHttpClient($httpClient);
	}

	public function setHttpClient($httpClient)
	{
		$this->httpClient = $httpClient;

		return $this;
	}

	public function getHttpClient()
	{
		return $this->httpClient;
	}

	public function get($uri = null, $options = [])
	{
		return $this->_request('GET',$uri,$options);
	}

	public function post($uri = null, $options = [])
	{
		return $this->_request('POST',$uri,$options);
	}

	public function put($uri = null, $options = [])
	{
		return $this->_request('PUT',$uri,$options);
	}

	public function delete($uri = null, $options = [])
	{
		return $this->_request('DELETE',$uri,$options);
	}

	private function _request($type = 'POST', $uri = null, $options = [])
	{
		$response = [
			"message"		=> null,
			"results" 		=> null,
			"errors" 		=> null,
			"statusCode" 	=> 200
		];

		try{
			$request = $this->getHttpClient()->request($type, $uri, $options);
			$requestContents = json_decode($request->getBody()->getContents(),true);
			$response["message"] = $requestContents['message']; 
			$response["results"] = $requestContents['results']; 
		}catch(ClientException $e){
			$response["message"] = "Please check you input.";
            $response["message_bot"] = $e->getMessage();
			$response["errors"]["form_errors"] = json_decode($e->getResponse()->getBody()->getContents(),true);
			$response['statusCode'] = $e->getResponse()->getStatusCode();
		}
		
		return $response;
	}
}