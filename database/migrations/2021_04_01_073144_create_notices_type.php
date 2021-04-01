<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices_type', function (Blueprint $table) {
            $table->id();
            $table->string('notice_type');
            $table->timestamps();
        });

        DB::table('notices_type')->insert(['notice_type'=>'Public Notice']);
        DB::table('notices_type')->insert(['notice_type'=>'Special Notice']);
        DB::table('notices_type')->insert(['notice_type'=>'Reminder']);
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices_type');
    }
}
