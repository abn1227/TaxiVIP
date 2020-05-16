<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxiDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxi_drivers', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->integer('mileage'); //  es para acumular kilometraje
            $table->integer('percentage');
            $table->integer('cut_date');
            $table->date('current_driver_license');
            $table->integer('accrued_payments');
            $table->string('status', 1);
            $table->string('active', 1);
            $table->bigInteger('persons_id')->unsigned();
            $table->foreign('persons_id')->references('id')->on('persons');
            $table->bigInteger('route_zones_id')->unsigned();
            $table->foreign('route_zones_id')->references('id')->on('route_zones');
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
        Schema::dropIfExists('taxi_drivers');
    }
}
