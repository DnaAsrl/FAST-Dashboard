<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityMaturedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_matured', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_code')->unique();
            $table->foreign('facility_code')->references('facility_code')->on('facility_information');
            $table->string('principle');
            $table->date('maturity_date');
            $table->string('instrument_id');
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
        Schema::dropIfExists('facility_matured');
    }
}
