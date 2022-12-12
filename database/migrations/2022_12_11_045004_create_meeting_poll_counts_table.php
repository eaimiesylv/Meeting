<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_poll_counts', function (Blueprint $table) {
            $table->id();
        //$table->unsignedBigInteger('meeting_id');
            $table->unsignedBigInteger('attendee_id')->nullable();
            $table->unsignedBigInteger('poll_question_id');
            $table->unsignedBigInteger('option_id');
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
        Schema::dropIfExists('meeting_poll_counts');
    }
};
