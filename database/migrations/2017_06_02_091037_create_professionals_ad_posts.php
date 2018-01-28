<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsAdPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals_ad_posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('uid')->nullable();
            $table->string('title');
            $table->text('content');
            $table->integer('created_by');
            $table->text('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->enum('status', ['0', '1', '2' ,'3', '4', '5']); // 0 = Needs approval, 1 = approved, 2 = expired, 3 = pending payment , 4 = 
            $table->dateTime('expired_at')->nullable();
            $table->timeStamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionals_ad_posts');
    }
}
