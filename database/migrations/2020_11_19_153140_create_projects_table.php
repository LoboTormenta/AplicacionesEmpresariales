<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');

            $table->float('budget');
            $table->string('name');
            $table->date('execution_date');
            $table->boolean('is_active');
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
        Schema::dropIfExists('projects');
    }
}
