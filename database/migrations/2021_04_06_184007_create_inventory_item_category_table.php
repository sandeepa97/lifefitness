<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryItemCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_item_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->timestamps();
        });
        DB::table('inventory_item_category')->insert(['category_name'=>'Cardio Machines']);
        DB::table('inventory_item_category')->insert(['category_name'=>'Exercise Machines']);
        DB::table('inventory_item_category')->insert(['category_name'=>'Dumb Bells']);
        DB::table('inventory_item_category')->insert(['category_name'=>'BB Bars']);
        DB::table('inventory_item_category')->insert(['category_name'=>'DB Bars']);
        DB::table('inventory_item_category')->insert(['category_name'=>'Plates']);
        DB::table('inventory_item_category')->insert(['category_name'=>'Benches']);
        DB::table('inventory_item_category')->insert(['category_name'=>'Racks']);
        DB::table('inventory_item_category')->insert(['category_name'=>'Other']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_item_category');
    }
}
