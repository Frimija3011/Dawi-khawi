<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('requetes', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                            
                  
                  // IP
                  $table->string('ip');
                  
                  // Host
                  $table->string('host');
                  
                  // Port
                  $table->string('port');
                  
                  // Uri
                  $table->string('uri');
                  
                  // Method
                  $table->string('method');
                  
                  // Script
                  $table->string('script');
                  
                  // User
                  $table->integer('user_id')->nullable()->index();

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
        Schema::dropIfExists('requetes');
    }
}
