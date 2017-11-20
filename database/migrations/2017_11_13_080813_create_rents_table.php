<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rent_no')->unique();
            $table->string('id_ship');
            $table->string('id_container');
            $table->string('set_point');
            $table->date('date_in');
            $table->string('time_in');
            $table->date('date_out')->nullable();
            $table->string('time_out')->nullable();
            $table->string('temperature_out')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('rents');
    }
}
