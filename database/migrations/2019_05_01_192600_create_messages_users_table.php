<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('messages_users', function (Blueprint $table) {
                  
                  // id
                  $table->increments('id');                  
                  
                  // User : From
                  $table->integer('user_from')->unsigned();
                  $table->foreign('user_from')->references('id')->on('users');
                  
                  // User : To
                  $table->integer('user_to')->unsigned();
                  $table->foreign('user_to')->references('id')->on('users');
                  
                  // Message
                  $table->string('content');
                  $table->tinyInteger('archive')->default(false);
                  
                  // Pièce jointe
                  $table->integer('image_id')->nullable();
                  
                  $table->timestamps();
                  $table->softDeletes();
                  
                  /*

                   * INSERT INTO `messages_users` (`id`, `user_from`, `user_to`, `content`, `archive`, `piece_jointe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '2', '1', 'coucou ca va azzouz', '0', NULL, NULL, NULL, NULL), (NULL, '1', '2', 'oui tres bien jeannette et toi', '0', NULL, NULL, NULL, NULL);
                   *                    */
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages_users');
    }
}
