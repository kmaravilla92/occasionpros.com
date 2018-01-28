<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_informations',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('countries_served')->nullable();
            $table->text('biography')->nullable();
            $table->text('location')->nullable();
            $table->text('contact_number')->nullable();
            // General info
            $table->string('business_name')->nullable();
            $table->string('city_based')->nullable();
            $table->string('willing_distance_to_travel')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('has_liability_insurance')->nullable();
            $table->text('separation_from_other_pros')->nullable();
            $table->string('reference_upon_request')->nullable();
            $table->string('require_deposit')->nullable();
            $table->string('advance_booking_amount')->nullable();
            $table->string('languages_can_speak')->nullable();
            $table->string('can_provide_cultural_services')->nullable();
            // General info
            $table->text('media')->nullable(); // images, videos, music, social media links
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
        Schema::dropIfExists('professional_informations');
    }
}
