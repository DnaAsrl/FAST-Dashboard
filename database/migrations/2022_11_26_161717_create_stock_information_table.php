<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_information', function (Blueprint $table) {
            $table->id();
            $table->string('stock_code');
            $table->index('stock_code');
            $table->string('stock_description');
            $table->string('isin_code');
            $table->string('issuer');
            $table->bigInteger('facility_code');
            $table->foreign('facility_code')->references('facility_code')->on('facility_information');
            $table->string('instrument_id');
            $table->date('issue_date');
            $table->date('maturity_date');
            $table->string('currency');
            $table->string('currency_exchange_rate');
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
        Schema::dropIfExists('stock_information');
    }
}
