<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementDirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_dir', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id');
            $table->foreign('news_id')->references('news_id')->on('all_announcements');
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
        Schema::dropIfExists('announcement_dir');
    }
}
