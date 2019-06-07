<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Outils\Constantes;

use App\User;
use App\Models\Profil;

class UsersController extends Controller
{
      private $user;
      private $profil;
      
      function __construct(Membre $membre, User $user) {
            $this->user = $user;
            $this->profil = $profil;
      }
      
      /*************************** METHODES PUBLIQUES *********************************/
      public function getAllUsers()
      {
            $membres = $this->user->getAll(true);
            
            return $membres;
      }

      public function getById($id)
      {
            $user = $this->user->getById($id);
            
            if ($user) {
                  return $user;
            }
            
            return null;
      }
      
      public function showUserMessages(Request $request)
      {
            session(['user_edit_session_id' => $request->input('id_user_edit')]);
            
            session(['affichage_gauche' => Constantes::LISTE_MEMBRES ]);

            return redirect()->route('home');
      }
      
}
