<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_bids',function(Blueprint $table){
            $table->increments('id');
            $table->text('details');
            $table->integer('created_by'); // user_id
            $table->integer('event_id');
            $table->enum('status', ['0', '1', '2', '3']);
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
        Schema::dropIfExists('events_bids');
    }
}
