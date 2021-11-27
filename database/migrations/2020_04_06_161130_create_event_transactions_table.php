<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_id')->unique()->index();
            $table->float('amount', 10, 2);
            $table->float('convenience_fee', 10, 2);
            $table->float('total_amount', 10, 2);
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
        Schema::dropIfExists('event_transactions');
    }
}
