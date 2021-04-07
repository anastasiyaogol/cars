<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->smallInteger('issue_year');
            $table->smallInteger('mileage');
            $table->integer('price');
            $table->string('seller_name');
            $table->string('seller_phone');
            $table->string('img');
            $table->enum('fuel_id',['1','2','3']);
            $table->enum('transmission_id',['1','2']);
            $table->enum('type_id',['1','2','3','4','5']);
            $table->integer('user_id');
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
        Schema::dropIfExists('autos');
    }
}
