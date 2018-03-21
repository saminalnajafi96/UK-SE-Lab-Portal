<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->integer('node_number');
            $table->string('os');
            $table->string('front_image');
            $table->string('back_image');
            $table->string('node_ip');
	        $table->string('management_ip')->nullable();
	        $table->integer('button'); // Removes duplicate connect buttons due to HA pair (e.g. FAS2552)
	        $table->integer('environment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardware');
    }
}