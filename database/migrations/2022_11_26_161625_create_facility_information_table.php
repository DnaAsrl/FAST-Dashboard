<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_code');
            $table->index('facility_code');
            $table->string('facility_description');
            $table->string('issuer');
            $table->string('facility_agent');
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
        Schema::dropIfExists('facility_information');
    }
}
