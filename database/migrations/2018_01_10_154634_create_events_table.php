<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser');
            $table->string('nameEvent');
            $table->string('descriptionEvent');
            $table->integer('priceEvent')->nullable();
            $table->string('photoEvent');
            $table->date('startDate');
            $table->date('finishDate')->nullable();
            $table->time('startTime');
            $table->time('finishTime')->nullable();
            $table->string('place');
            $table->string('assistance');
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
        Schema::dropIfExists('events');
    }
}
