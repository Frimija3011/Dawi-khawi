<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('rooms', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                  

                  // Champs
                  $table->string('label');
                  $table->tinyInteger('prive')->default(0);
                  $table->string('code')->nullable();
                  
                  // F.K
                  $table->integer('user_id')->unsigned();
                  $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('rooms');
    }
}
