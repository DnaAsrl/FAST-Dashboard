<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityDirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_dir', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_code');
            $table->foreign('facility_code')->references('facility_code')->on('facility_information');
            $table->string('dir_path');
            $table->string('comparison')->nullable();
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
        Schema::dropIfExists('facility_dir');
    }
}
