<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_membership', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('options')->nullable();
            $table->enum('status', ['0','1','2']);
            $table->enum('has_availed_free', ['0','1']); // 0 = no, 1 = yes
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
        Schema::dropIfExists('user_membership');
    }
}
