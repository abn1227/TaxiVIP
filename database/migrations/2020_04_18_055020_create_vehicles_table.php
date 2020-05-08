<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color', 45);
            $table->string('license_plate', 45)->unique();
            $table->string('active', 1);
            $table->string('status', 1);
            $table->bigInteger('taxi_drivers_id')->unsigned();
            $table->foreign('taxi_drivers_id')->references('id')->on('taxi_drivers');
            $table->bigInteger('car_models_id')->unsigned();
            $table->foreign('car_models_id')->references('id')->on('car_models');
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
        Schema::dropIfExists('vehicles');
    }
}
