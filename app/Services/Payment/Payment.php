<?php

namespace App\Services\Payment;

use Paypalpayment;

class Payment
{

	protected $vendor;

	protected $apiContext;

	public function __construct()
	{
		$this->setApiContext(
			config('paypal_payment.Account.ClientId'),
			config('paypal_payment.Account.ClientSecret')
		);
	}

	public function setApiContext($clientId = null,$clientSecret = null)
	{
		$this->apiContext = Paypalpayment::ApiContext(
            $clientId,
            $clientSecret
        );

		$this->apiContext->setConfig([
            'mode' => config('paypal_payment.Mode')
        ]);

		return $this;
	}

	public function getApiContext()
	{
		return $this->apiContext;
	}

	/*public function setVendor($vendor)
	{
		$this->vendor = $vendor;
		return $this;
	}

	public function getVendor()
	{
		return $this->vendor;
	}*/
}