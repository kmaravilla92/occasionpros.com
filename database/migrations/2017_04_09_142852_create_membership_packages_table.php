<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_packages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->float('price')->default(0);
            $table->integer('max_bids')->default(0);
            $table->integer('max_categories')->default(0);
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
        Schema::dropIfExists('membership_packages');
    }
}
