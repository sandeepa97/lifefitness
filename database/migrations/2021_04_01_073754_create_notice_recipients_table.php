<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_recipients', function (Blueprint $table) {
            $table->id();
            $table->string('recipient');
            $table->timestamps();
        });

        DB::table('notice_recipients')->insert(['recipient'=>'Members']);
        DB::table('notice_recipients')->insert(['recipient'=>'Trainers']);
        DB::table('notice_recipients')->insert(['recipient'=>'Members + Trainers']);
        DB::table('notice_recipients')->insert(['recipient'=>'Public']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice_recipients');
    }
}
