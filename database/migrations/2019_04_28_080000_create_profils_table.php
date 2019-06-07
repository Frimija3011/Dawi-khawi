<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('profils', function (Blueprint $table) {
                  
                  $table->increments('id');
                  
                  //  Image
                  $table->integer('image_id')->nullable();
                  
                  //  Dates
                  $table->dateTime('date_naissance')->nullable();
                  $table->dateTime('date_inscription');
                  $table->dateTime('date_prem_connexion');
                  $table->dateTime('date_dern_connexion');
                  $table->dateTime('date_dern_dcnx')->nullable();
                  
                  // Civilité
                  $table->string('civilite')->default('NC');
                  $table->string('nom');
                  $table->string('prenom');
                  
                  // F.K
                  $table->integer('user_id')->unsigned();
                  $table->foreign('user_id')->references('id')->on('users');
                  
                  // Type
                  $table->string('type')->default('UTILISATEUR');
                  
                  // Bloque
                  $table->tinyInteger('bloque')->default(0);                  
                  
                  // Statut
                  $table->string('statut')->default('EN_LIGNE');

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
        Schema::dropIfExists('profils');
    }
}
