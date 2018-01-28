<?php

namespace App\Services\Payment;

use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use Paypalpayment;

class Subscription extends Payment
{

	protected $_created_plan;

	protected function _createBillingPlan($billing_plan = [])
	{
		$plan = new Plan();
		$plan
			->setName($billing_plan['name'])
			->setDescription($billing_plan['description'])
			->setType($billing_plan['type']);

		$paymentDefinitions = [];

		$paymentDefinition = new PaymentDefinition();
		$paymentDefinition->setName($billing_plan['payment_definition']['name'])
			->setType($billing_plan['payment_definition']['type'])
			->setFrequency($billing_plan['payment_definition']['frequency'])
			->setFrequencyInterval($billing_plan['payment_definition']['frequency_interval'])
			->setCycles($billing_plan['payment_definition']['cycles'])
			->setAmount(
				new Currency([
					'value' => $billing_plan['payment_definition']['amount'], 
					'currency' => 'USD'
				])
			);

		$paymentDefinitions[] = $paymentDefinition;

		if(isset($billing_plan['trial_payment_definition'])){
			$trialPaymentDefinition = new PaymentDefinition();
			$trialPaymentDefinition->setName($billing_plan['trial_payment_definition']['name'])
				->setType($billing_plan['trial_payment_definition']['type'])
				->setFrequency($billing_plan['trial_payment_definition']['frequency'])
				->setFrequencyInterval($billing_plan['trial_payment_definition']['frequency_interval'])
				->setCycles($billing_plan['trial_payment_definition']['cycles'])
				->setAmount(
					new Currency([
						'value' => $billing_plan['trial_payment_definition']['amount'], 
						'currency' => 'USD'
					])
				);
				$paymentDefinitions[] = $trialPaymentDefinition;
		}

		$merchantPreferences = new MerchantPreferences();
		$baseUrl = 'https://occasionpros.com';
		$merchantPreferences->setReturnUrl("$baseUrl/test-paypal-recur-step2?success=true")
			->setCancelUrl("$baseUrl/test-paypal-recur-step2?success=false")
			->setAutoBillAmount("yes")
			->setInitialFailAmountAction("CONTINUE")
			->setMaxFailAttempts("0")
			->setSetupFee(new Currency(array('value' => 0, 'currency' => 'USD')));

		$plan->setPaymentDefinitions($paymentDefinitions);
		$plan->setMerchantPreferences($merchantPreferences);
		$created_plan = $plan->create($this->getApiContext());
		$this->setCreatedPlan(
			$created_plan
		);
		return $this;
	}

	protected function _updatePlan()
	{
		$patch = new Patch();

	    $value = new PayPalModel('{
		       "state":"ACTIVE"
		     }');

	    $patch->setOp('replace')
	        ->setPath('/')
	        ->setValue($value);
	    $patchRequest = new PatchRequest();
	    $patchRequest->addPatch($patch);

	    $this->getCreatedPlan()->update($patchRequest, $this->getApiContext());

	    $plan = Plan::get($this->getCreatedPlan()->getId(), $this->getApiContext());

	    return $this;
	}

	public function createBillingAgreement($data)
	{

		$this->_createBillingPlan($data['billing_plan'])->_updatePlan();

		$agreement = new Agreement();
		$agreement->setName($data['agreement']['name'])
			->setDescription($data['agreement']['description'])
			->setStartDate($data['agreement']['start_date']);

		$plan = new Plan();
		$plan
			->setId(
				$this
					->getCreatedPlan()
					->getId()
			);

		$agreement->setPlan($plan);

		$card = Paypalpayment::creditCard();
		$card->setType($data['credit_card']['type'])
            ->setNumber($data['credit_card']['number'])
            ->setExpireMonth($data['credit_card']['exp_date_month'])
            ->setExpireYear($data['credit_card']['exp_date_year'])
            ->setCvv2($data['credit_card']['sec_code'])
            ->setFirstName($data['credit_card']['first_name'])
            ->setLastName($data['credit_card']['last_name']);

		$fi = Paypalpayment::fundingInstrument();
		$fi->setCreditCard($card);

		$payer = new Payer();
		$payer
			->setPayerInfo($data['payer_info'])
			->setPaymentMethod('credit_card')
			->setFundingInstruments(array($fi));

		$agreement->setPayer($payer);
		// $shippingAddress = new ShippingAddress();
		// $shippingAddress
		// 	->setLine1('111 First Street')
		// 	->setCity('Saratoga')
		// 	->setState('CA')
		// 	->setPostalCode('95070')
		// 	->setCountryCode('US');

		// $agreement->setShippingAddress($shippingAddress);
		try{
			$agreement = $agreement->create($this->getApiContext());
		}catch(\Exception $ex){
			throw new \Exception($ex->getMessage());
		}
		$approvalUrl = $agreement->getApprovalLink();
		return [
			'agreement' => $agreement,
			'plan' => $this->getCreatedPlan(),
			'approvalUrl' => $approvalUrl
		];
	}

	protected function getCreatedPlan()
	{
		return $this->_created_plan;
	}

	protected function setCreatedPlan($_created_plan = null)
	{
		$this->_created_plan = $_created_plan;
	}

	public function getAgreementById($agreement_id)
	{
		return Agreement::get($agreement_id, $this->getApiContext());
	}

	public function getPlanById($agreement_id)
	{
		return Plan::get($agreement_id, $this->getApiContext());
	}

	public function cancelAgreementById($agreement_id, $note = '')
	{
		$createdAgreement = $this->getAgreementById($agreement_id);
		//Create an Agreement State Descriptor, explaining the reason to suspend.
		$agreementStateDescriptor = new AgreementStateDescriptor();
		$agreementStateDescriptor->setNote($note);

		return $createdAgreement->cancel($agreementStateDescriptor, $this->getApiContext());
	}
}