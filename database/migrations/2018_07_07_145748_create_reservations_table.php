<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('reservation_number');
            $table->unsignedInteger('customer_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->softDeletes();
            $table->timestamps();

            $table->primary('reservation_number');
            $table->foreign('customer_id')->references('id')->on('customers');

        });

        Schema::create('reservation_room', function (Blueprint $table) {
            $table->uuid('reservation_number');
            $table->unsignedInteger('room_id');
            $table->timestamps();

            $table->primary(['reservation_number', 'room_id']);

            $table->foreign('reservation_number')->references('reservation_number')->on('reservations')->onDelete('CASCADE');
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
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('reservation_room');
    }
}
