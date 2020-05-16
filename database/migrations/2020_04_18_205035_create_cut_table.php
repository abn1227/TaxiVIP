<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cut', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('payment',6, 2);
            $table->dateTime('cut_date');
            $table->string('status', 1);
            $table->bigInteger('taxi_drivers_id')->unsigned();
            $table->foreign('taxi_drivers_id')->references('id')->on('taxi_drivers');
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
            Schema::dropIfExists('cut');
    }
}
