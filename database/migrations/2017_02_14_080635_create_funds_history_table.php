<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds_history', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('payment_transaction_code');
            $table->enum('status', ['0','1','2']); // 0 = Stale, 1 = Requested & Pending, 2 = Transferred
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
        Schema::dropIfExists('funds_history');
    }
}
