<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_shifts', function (Blueprint $table) {
            $table->id();
            $table->string('trainer_id');
            $table->date('shift_date');
            $table->time('shift_start_time');
            $table->time('shift_end_time');
            $table->string('shift_type_id');
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
        Schema::dropIfExists('trainer_shifts_tble');
    }
}
