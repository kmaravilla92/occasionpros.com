<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('feedback');
            $table->integer('created_by');
            $table->integer('created_for');
            $table->integer('event_id');
            $table->integer('rating');
            $table->enum('status',['0','1']); // 0 = Inactive, Active
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
        Schema::dropIfExists('testimonials');
    }
}
