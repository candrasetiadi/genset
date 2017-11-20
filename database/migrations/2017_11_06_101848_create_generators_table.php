<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('generator_no')->unique();
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('diesel_fuel_capacity')->nullable();
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
        Schema::dropIfExists('generators');
    }
}
