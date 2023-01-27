<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockDirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_dir', function (Blueprint $table) {
            $table->id();
            $table->string('stock_code');
            $table->foreign('stock_code')->references('stock_code')->on('stock_information');
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
        Schema::dropIfExists('stock_dir');
    }
}
