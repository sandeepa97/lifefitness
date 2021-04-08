<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutScheduleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_schedule_types', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_type');
            $table->timestamps();
        });
        
        DB::table('workout_schedule_types')->insert(['schedule_type'=>'Endurance']);
        DB::table('workout_schedule_types')->insert(['schedule_type'=>'Beginner']);
        DB::table('workout_schedule_types')->insert(['schedule_type'=>'Intermediate']);
        DB::table('workout_schedule_types')->insert(['schedule_type'=>'Advance']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_schedule_types');
    }
}
