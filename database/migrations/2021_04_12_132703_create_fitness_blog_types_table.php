<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitnessBlogTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_blog_types', function (Blueprint $table) {
            $table->id();
            $table->string('blog_type');
            $table->timestamps();
        });
        DB::table('fitness_blog_types')->insert(['blog_type'=>'Nutrition']);
        DB::table('fitness_blog_types')->insert(['blog_type'=>'Exercise']);
        DB::table('fitness_blog_types')->insert(['blog_type'=>'Health']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fitness_blog_types');
    }
}
