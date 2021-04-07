<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerShiftsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_shifts_type', function (Blueprint $table) {
            $table->id();
            $table->string('shift_type');
            $table->timestamps();
        });
        DB::table('trainer_shifts_type')->insert(['shift_type'=>'Full Day']);
        DB::table('trainer_shifts_type')->insert(['shift_type'=>'Half Day']);
        DB::table('trainer_shifts_type')->insert(['shift_type'=>'Custom']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainer_shifts_type');
    }
}
