<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('code');
            $table->integer('paid_for');
            $table->integer('paid_by');
            $table->integer('event_id');
            $table->float('amount', 12, 2);
            $table->enum('status', ['0','1','2']); // 0 = Failed, 1 = Pending, 2 = Paid
            $table->softDeletes();
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
}
