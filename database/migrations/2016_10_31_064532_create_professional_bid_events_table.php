<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalBidEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_bid_events',function(Blueprint $table){
            $table->increments('id');
            $table->integer('professional_id');
            $table->integer('event_id');
            $table->enum('application_status',['0','1','2','3']); // 0 = Pending, 1 = Applied, 2 = Not hired, 3 = Ended
            $table->enum('status',['0','1']); // 0 = Inactive, 1 = Active
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_bid_events');
    }
}
