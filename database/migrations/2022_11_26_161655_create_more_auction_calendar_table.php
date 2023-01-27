<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreAuctionCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_auction_calendar', function (Blueprint $table) {
            $table->id();
            $table->string('issues');
            $table->string('target_quarter');
            $table->string('target_month');
            $table->string('target_year');
            $table->date('issue_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('more_auction_calendar');
    }
}
