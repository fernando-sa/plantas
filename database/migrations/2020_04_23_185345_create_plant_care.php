<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantCare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantCares', function (Blueprint $table) {
            $table->id();
            $table->date('beginDate');
            $table->date('endDate');
            $table->boolean('isTaken')->default(false);
            $table->bigInteger('ownerId')->unsigned()->nullable();
            $table->foreign('ownerId')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('responsibleUserId')->unsigned()->nullable();
            $table->foreign('responsibleUserId')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('plantCares');
    }
}
