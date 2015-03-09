<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnvironmentsServersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_server', function (Blueprint $table) {
            $table->integer('environment_id')->unsigned();
            $table->integer('server_id')->unsigned();
            $table->timestamps();

            $table->foreign('environment_id')->references('id')->on('environments');
            $table->foreign('server_id')->references('id')->on('servers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('environment_server');
    }

}
