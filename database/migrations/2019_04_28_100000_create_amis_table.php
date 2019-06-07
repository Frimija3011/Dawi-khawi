<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('amis', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                  
                  
                  // F.K
                  $table->integer('user_1')->unsigned();
                  $table->foreign('user_1')->references('id')->on('users');
                  
                  // F.K
                  $table->integer('user_2')->unsigned();
                  $table->foreign('user_2')->references('id')->on('users');
                  
                  // Bloqué
                  $table->tinyInteger('bloque')->default(false);
                  
                  $table->integer('user_bloque')->nullable();
                  
                  $table->timestamps();
                  $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amis');
    }
}
