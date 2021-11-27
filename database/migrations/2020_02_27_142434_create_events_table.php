<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('eventcategory_id');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->string('slug');
            $table->unsignedBigInteger('city_id');
            $table->string('location');
            $table->string('picture');
            $table->string('social')->nullable();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('eventcategory_id')->references('id')->on('event_categories');
            $table->foreign('city_id')->references('id')->on('cities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
