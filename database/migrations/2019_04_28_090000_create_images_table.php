<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('images', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                  

                  // Champs
                  $table->string('type');
                  $table->string('label');
                  $table->string('chemin');
                  $table->float('taille');
                  $table->tinyInteger('genre');

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
        Schema::dropIfExists('images');
    }
}
