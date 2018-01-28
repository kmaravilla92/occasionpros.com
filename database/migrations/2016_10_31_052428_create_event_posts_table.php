<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_posts',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('event_type_id');
            $table->string('email');
            $table->string('contact_number');
            $table->dateTime('date');
            $table->string('location');
            $table->string('budget');
            $table->enum('status',['0','1','2']); // 0 = Inactive, 1 = Confirmed By Owner, 2 = Confirmed By Owner & Admin
            $table->integer('created_by');
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
        Schema::dropIfExists('event_posts');
    }
}
