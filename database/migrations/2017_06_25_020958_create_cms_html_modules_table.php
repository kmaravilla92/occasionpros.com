<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsHtmlModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_html_modules', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->option('options')->nullable();
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
       Schema::dropIfExists('cms_html_modules');
    }
}
