<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberStatusTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_status_types', function (Blueprint $table) {
            $table->id();
            $table->string('status_type');
            $table->timestamps();
        });

        DB::table('member_status_types')->insert(['status_type'=>'Normal']); //20-25
        DB::table('member_status_types')->insert(['status_type'=>'Underweight']); // bmi<18.5
        DB::table('member_status_types')->insert(['status_type'=>'Overweight']); //25-30
        DB::table('member_status_types')->insert(['status_type'=>'Obese']); //bmi>30
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_status_types');
    }
}
