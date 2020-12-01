<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('host_id')->nullable();
            $table->bigInteger('building_id')->nullable();
            $table->string('name');
            $table->integer('price');
            $table->bigInteger('room_category_id')->nullable();
            $table->string('utility_id')->nullable();
            $table->integer('acreage');
            $table->integer('max_people');
            $table->integer('floors');
            $table->integer('status')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
