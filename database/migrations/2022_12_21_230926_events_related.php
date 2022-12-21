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

        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->unsignedBigInteger('event_type_id');
            $table->text('venue')->nullable();
            $table->timestamp('date')->nullable();
            $table->longText('content')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();

            $table->foreign('event_type_id')
                ->references('id')->on('event_types')
                ->onDelete('cascade');
        });

        Schema::create('event_leaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('leader_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

            $table->foreign('leader_id')
                ->references('id')->on('leaders')
                ->onDelete('cascade');
        });

        Schema::create('event_coorganizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('organize_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

            $table->foreign('organize_id')
                ->references('id')->on('organizes')
                ->onDelete('cascade');
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
