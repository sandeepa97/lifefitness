<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_type', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->timestamps();
        });

        DB::table('payments_type')->insert(['payment_type'=>'Registration Fee']);
        DB::table('payments_type')->insert(['payment_type'=>'Monthly Membership Fee']);
        DB::table('payments_type')->insert(['payment_type'=>'3 Months Membership Fee']);
        DB::table('payments_type')->insert(['payment_type'=>'6 Months Membership Fee']);
        DB::table('payments_type')->insert(['payment_type'=>'Annual Membership Fee']);
        DB::table('payments_type')->insert(['payment_type'=>'Custom']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments_type');
    }
}
