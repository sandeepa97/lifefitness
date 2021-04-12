<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineCoachPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_coach_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->timestamps();
        });
        DB::table('online_coach_packages')->insert(['package_name'=>'4 Weeks']);
        DB::table('online_coach_packages')->insert(['package_name'=>'12 Weeks']);
        DB::table('online_coach_packages')->insert(['package_name'=>'24 Weeks']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_coach_packages');
    }
}
