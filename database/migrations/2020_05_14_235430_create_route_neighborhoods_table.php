<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteNeighborhoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_neighborhoods', function (Blueprint $table) {
            $table->bigInteger('route_zones_id')->unsigned();
            $table->bigInteger('neighborhoods_id')->unsigned();
            $table->foreign('route_zones_id')->references('id')->on('route_zones');
            $table->foreign('neighborhoods_id')->references('id')->on('neighborhoods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_neighborhoods');
    }
}
