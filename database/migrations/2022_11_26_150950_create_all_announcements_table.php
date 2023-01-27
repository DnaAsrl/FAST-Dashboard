<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_announcements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id');
            $table->index('news_id');
            $table->dateTime('embargo_date');
            $table->string('organisation_name');
            $table->string('news_type');
            $table->string('news_subject');
            $table->string('news_summary')->nullable();
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
        Schema::dropIfExists('all_announcements');
    }
}
