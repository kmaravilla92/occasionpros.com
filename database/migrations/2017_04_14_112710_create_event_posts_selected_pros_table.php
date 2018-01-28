<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPostsSelectedProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_posts_selected_pros', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('user_id');
            $table->integer('testimonial_id')->nullable();
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();
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
        Schema::drop('event_posts_selected_pros');
    }
}
