<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('host_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('electricity_price')->nullable();
            $table->integer('water_price')->nullable();
            $table->integer('internet_price')->nullable();
            $table->integer('cleaning_price')->nullable();
            $table->integer('elevator_price')->nullable();
            $table->integer('parking_price')->nullable();
            $table->longText('description')->nullable();
            $table->integer('rating')->nullable();
            $table->bigInteger('view')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->string('address')->nullable();
            $table->string('google_map')->nullable();
            $table->string('utility_id')->nullable();
            $table->bigInteger('school_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('active')->nullable();
            $table->integer('rank')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
