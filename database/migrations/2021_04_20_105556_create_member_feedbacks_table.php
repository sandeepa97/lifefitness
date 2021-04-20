<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('feedback_subject');
            $table->string('feedback_content');
            $table->date('feedback_date');
            $table->time('feedback_time');
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
        Schema::dropIfExists('member_feedbacks');
    }
}
