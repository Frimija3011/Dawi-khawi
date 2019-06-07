<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('users_groupes', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                  

                  // Champs
                  $table->integer('user_id');
                  $table->integer('groupe_id');
                  $table->tinyInteger('active')->default(true);

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
        Schema::dropIfExists('users_groupes');
    }
}
