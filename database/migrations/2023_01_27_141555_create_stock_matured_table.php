<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMaturedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_matured', function (Blueprint $table) {
            $table->id(); 
            $table->string('stock_code')->unique();
            $table->foreign('stock_code')->references('stock_code')->on('stock_information');
            $table->bigInteger('facility_code');
            $table->foreign('facility_code')->references('facility_code')->on('facility_information');
            $table->string('instrument_id');
            $table->date('issue_date');
            $table->date('maturity_date');
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
        Schema::dropIfExists('stock_matured');
    }
}
