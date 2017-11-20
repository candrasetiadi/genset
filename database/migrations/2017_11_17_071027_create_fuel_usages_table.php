<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_usages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_field')->nullable();
            $table->date('date')->nullable();
            $table->integer('id_generator')->nullable();
            $table->integer('usage')->nullable();
            $table->decimal('price')->nullable();
            $table->string('field_operator')->nullable();
            $table->string('unit_operator')->nullable();
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
        Schema::dropIfExists('fuel_usages');
    }
}
