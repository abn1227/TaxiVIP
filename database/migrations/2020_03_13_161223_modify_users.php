<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('persons_id')->unsigned()->after('password');
            $table->foreign('persons_id')->references('id')->on('persons');
            $table->bigInteger('type_users_id')->unsigned()->after('password');
            $table->foreign('type_users_id')->references('id')->on('type_users'); 
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_persons_id_foreign');
            $table->dropColumn('persons_id');
            $table->dropForeign('users_type_users_id_foreign');
            $table->dropColumn('type_users_id');
        });
        Schema::table('users', function(Blueprint $table){
            $table->string('name');
        });
        //
    }
}
