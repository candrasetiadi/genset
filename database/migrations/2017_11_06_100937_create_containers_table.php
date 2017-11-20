<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('container_no', 13)->unique();
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->integer('id_field')->nullable();
            $table->integer('id_ship')->nullable();
            $table->decimal('recooling_price')->nullable();
            $table->decimal('monitoring_price')->nullable();
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
        Schema::dropIfExists('containers');
    }
}
