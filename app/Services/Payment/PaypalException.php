<?php

namespace App\Services\Payment;

use Exception;

class PaypalException extends Exception
{
	public function getErrorMessages()
	{
		$message = (array)json_decode($this->message);
		
		if(0 === count($message)){
			return 'Unknown error. Please try again later.';
		}

		if(!isset($message['details'])){
			return isset($message['message']) ? $message['message'] : 'Unknown error. Please try again later.';
		}

		return collect($message['details'])->map(function($details)
			{
				return $details->issue;
			})->implode("<br>");
	}

	protected function creditCardErrorLabelMap()
	{
		return [
			'payer.funding_instruments[0].credit_card.cvv2' => '',
			'payer.funding_instruments[0].credit_card.expire_month' => '',
			'payer.funding_instruments[0].credit_card.expire_year' => '',
			'payer.funding_instruments[0].credit_card.cvv2' => '',
			'payer.funding_instruments[0].credit_card.number' => ''
		];
	}
}