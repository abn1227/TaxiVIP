<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('price', 6, 2);
            $table->double('distance', 5, 2);
            $table->string('url_map', 250);
            $table->dateTime('date');
            $table->string('canceled', 1);
            $table->bigInteger('taxi_drivers_id')->unsigned();
            $table->foreign('taxi_drivers_id')->references('id')->on('taxi_drivers');
            $table->bigInteger('clients_id')->unsigned();
            $table->foreign('clients_id')->references('id')->on('clients');
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
        Schema::dropIfExists('orders');
    }
}
