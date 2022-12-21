<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsRelated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Here are all the needed tables for event

        Schema::create('event_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyText('name');
        });

        Schema::create('leaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyText('name');
        });

        Schema::create('organizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyText('name');
        });

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
