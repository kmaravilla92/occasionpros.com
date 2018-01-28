<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\FundHistory as FundHistoryEntity;
use App\Models\Entities\EventPost as EventPostEntity;
use App\Models\Entities\PaymentTransaction as PaymentTransactionEntity;
use App\User as UserEntity;

class PaymentTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentTransactionEntity::class, 100)->create()->each(function($payment_transaction)
        {
            $payment_transaction->paid_for  = UserEntity::all()->random(1)->id;
            $payment_transaction->paid_by   = UserEntity::all()->random(1)->id;
            $payment_transaction->event_id  = EventPostEntity::all()->random(1)->id;
            $payment_transaction->save();
        });
    }
}
