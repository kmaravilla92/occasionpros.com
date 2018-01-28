<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNthFieldsToFundsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funds_history', function(Blueprint $table)
        {
            $table->float('amount', 12, 2)->after('payment_transaction_code');
            $table->integer('owner_id')->after('amount');
            $table->integer('event_id')->after('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
