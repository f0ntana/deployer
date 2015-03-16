<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsEnvironmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_project', function (Blueprint $table) {
            $table->integer('environment_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('environment_id')->references('id')->on('environments');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('environment_project');
    }

}
