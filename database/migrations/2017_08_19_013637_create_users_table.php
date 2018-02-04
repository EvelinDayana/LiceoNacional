<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('users', function (Blueprint $table) {
              
            $table->increments('iduser');
            $table->string('email')->unique();     
            $table->string('nameUser');
            $table->string('document')->unique(); 
            $table->string('lastname');
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('photo')->default('usuario4.png');
            $table->string('state')->nullable();
            $table->string('typeUser');
            $table->string('age')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('departament')->nullable();;
            $table->string('city')->nullable();;
            $table->string('yearEntry')->nullable();
            $table->string('yearDeperture')->nullable();
            $table->string('emphasis')->nullable();
            $table->string('sex');

            $table->rememberToken('');           
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
        Schema::dropIfExists('users');
    }
}
