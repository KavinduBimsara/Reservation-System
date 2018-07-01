<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('room_no')->unique();
            $table->string('name');
            $table->string('slug')->default('');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('amenity_room', function (Blueprint $table) {
            $table->unsignedInteger('amenity_id');
            $table->unsignedInteger('room_id');
            $table->timestamps();

            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('CASCADE');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('CASCADE');
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
        Schema::dropIfExists('amenity_room');
    }
}
