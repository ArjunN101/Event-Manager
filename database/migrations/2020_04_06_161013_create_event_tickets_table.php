<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_id')->unique()->index();
            $table->bigInteger('event_id')->index();
            $table->string('user_id')->index();
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('email')->nullable();
            $table->string('date');
            $table->string('ticket', 255)->default('default.jpg');
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
        Schema::dropIfExists('event_tickets');
    }
}
