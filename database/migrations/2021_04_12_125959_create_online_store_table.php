<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_store', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_category_id');
            $table->string('item_description');
            $table->string('manufacturer');
            $table->decimal('price',7,2);
            $table->string('img_url')->nullable()->default('img/store/img.jpg');
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
        Schema::dropIfExists('online_store');
    }
}
