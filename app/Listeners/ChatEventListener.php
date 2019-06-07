<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

use App\Events\ChatEvent;

use App\Models\Profil;
use App\Models\Outils\Constantes;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatEventListener
{
      
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
          //
    }    
    
    /**
     * 
     * 
     * @param Login $login
     */
      public function handle(ChatEvent $event)
      {                      
            //
      }
}
