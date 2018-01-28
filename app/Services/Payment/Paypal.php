<?php

namespace App\Services\Payment;

use Exception;
use Paypalpayment;

class Paypal extends Payment implements PaymentInterface
{
	public function payWithCreditCard($data = [])
	{

        if(!config('occ_pros.settings.payment.enabled')){
            return null;
        }

		extract($data);

		if(0 === count($items_list)){
			throw new Exception("Please declare some items", 1);
		}

		$card = Paypalpayment::creditCard();
        $card->setType($credit_card['type'])
            ->setNumber($credit_card['number'])
            ->setExpireMonth($credit_card['exp_date_month'])
            ->setExpireYear($credit_card['exp_date_year'])
            ->setCvv2($credit_card['sec_code'])
            ->setFirstName($credit_card['first_name'])
            ->setLastName($credit_card['last_name']);

        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($fi));

        $amount_to_pay = 0;
            
        if(count($items_list)){
        	foreach($items_list as $index => $item){
        		$paypal_item = Paypalpayment::item();
		        $paypal_item->setName($item['title'])
		                ->setDescription($item['description'])
		                ->setCurrency('USD')
		                ->setQuantity($item['qty'])
		                ->setTax(0)
		                ->setPrice($item['amount']);

		        $amount_to_pay += ($item['amount'] * $item['qty']);
		        $items_list[$index] = $paypal_item;
        	}
        }

        $itemList = Paypalpayment::itemList();
        $itemList->setItems($items_list);

        $details = Paypalpayment::details();
        $details->setShipping(0)
                ->setTax(0)
                //total of items prices
                ->setSubtotal($amount_to_pay);

        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal($amount_to_pay)
                ->setDetails($details);

        $transactions_arr = [];

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($transaction_details['description'])
            ->setInvoiceNumber($transaction_details['invoice_number']);

        $transactions_arr[] = $transaction;

        $payment = Paypalpayment::payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions($transactions_arr);

        try{
        	return $payment->create(
	        	$this->getApiContext()
	        );
        }catch(Exception $e){
            if($e->getData() == null){
                throw new Exception($e->getMessage());
            }
        	throw new PaypalException($e->getData());
        }
	}

	public function payWithoutCreditCard($data = [])
	{

	}

	public function parseErrorMessages($data = '')
	{
		try{
			$error_details = json_decode($data);

		}catch(Exception $e){
			return null;
		}
	}
}