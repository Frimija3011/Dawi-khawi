<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\Profil;

use App\Models\Outils\Constantes;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccess
{
      private $profil;
      
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Profil $profil)
    {
          $this->profil = $profil;
    }    
    
    /**
     * 
     * 
     * @param Login $login
     */
      public function handle(Login $login)
      {                      
            if ($login->user) {
                  $son_profil = $this->profil->getByUser($login->user->id);
                  $son_profil->date_dern_connexion = date('Y-m-d H:i:s');
                  $son_profil->statut =Constantes::PROFIL_STATUT_EN_LIGNE;
                  $son_profil->save();
            }
      }
}
