<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('messages_rooms', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                  
                  
                  // User : From
                  $table->integer('user_from')->unsigned();
                  $table->foreign('user_from')->references('id')->on('users');
                  
                  // Message
                  $table->string('content');
                  $table->tinyInteger('archive')->default(false);
                  
                  // Pièce jointe
                  $table->integer('piece_jointe_id')->nullable();
                  
                  // Room
                  $table->integer('room_id')->unsigned();
                  $table->foreign('room_id')->references('id')->on('rooms');
                  
                  $table->timestamps();
                  $table->softDeletes();
            });
            
            /*
                  INSERT INTO `messages_rooms` (`id`, `user_from`, `content`, `archive`, `piece_jointe_id`, `room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '1', 'coucou c mon 1er msg', '0', NULL, '1', '2019-05-19 03:14:32', '2019-05-19 03:14:32', NULL);
                  INSERT INTO `messages_users` (`id`, `user_from`, `user_to`, `content`, `archive`, `piece_jointe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '1', '2', 'Coucou jeannette ca va? ', '0', NULL, NULL, NULL, NULL); 
                  INSERT INTO `messages_users` (`id`, `user_from`, `user_to`, `content`, `archive`, `piece_jointe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '2', '1', 'Oui mon chéri.. c cool ce site ca marche bien !!!', '0', NULL, NULL, NULL, NULL);
             */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages_rooms');
    }
}
