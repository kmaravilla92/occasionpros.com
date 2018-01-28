<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUidColumnToTables extends Migration
{

    protected $tables = [
        'blog_posts',
        'events_bids',
        'event_posts',
        'funds_history',
        'users'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach($this->tables as $table_name){
            Schema::table($table_name, function(Blueprint $table)
            {
                $table->string('uid')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach($this->tables as $table_name){
            Schema::table($table_name, function(Blueprint $table)
            {
                $table->dropColumn('uid');
            });
        }
    }
}
