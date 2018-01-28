<?php

namespace App\Services\Payment;

interface PaymentInterface
{
	public function payWithCreditCard($data = []);
	public function payWithoutCreditCard($data = []);
	public function parseErrorMessages($data = '');
}