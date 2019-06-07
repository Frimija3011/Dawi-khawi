<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outils\Constantes;
use App\Models\Outils\Methodes;

use App\Models\Room;
use App\Models\Profil;
use App\User;
use App\Models\Requete;
use App\Models\MessageUser;

use DateTime;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
      private $room;
      private $profil;
      private $user;      
      private $requete;      
      public $message_user;
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Room $room, Profil $profil, User $user, Requete $requete, MessageUser $message_user)
    {
        $this->middleware('auth');
        $this->room = $room;
        $this->profil = $profil;
        $this->user = $user;
        $this->requete = $requete;
        $this->message_user = $message_user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $data = [ ];
            
            // Connected user
            $connectd_user = Auth::user();            
            if (!$connectd_user) {
                  return redirect('/login');
            }            
            $profil_connected_user = $this->profil->getByUser($connectd_user->id);
            $data['id_connected_user'] = $connectd_user->id;
            
            // Affichage gauche
            $data['affichage_gauche'] = 'liste_membres';
            if (session('affichage_gauche')) {                  
                  $data['affichage_gauche'] = session('affichage_gauche');
            }
            
            // Placeholder de recherche
            $data['placeholder'] = 'Votre recherche ici';            
            switch (session('affichage_gauche')) {
                  case Constantes::LISTE_MEMBRES :
                        $data['placeholder'] = 'Rechercher un membre';
                        break;
                  case Constantes::LISTE_ROOMS :                        
                        $data['placeholder'] = 'Rechercher un room';
                        break;
            }
            
            // Affichage droite
            $data['affichage_droite'] = 'liste_messages_room';
            if (session('affichage_droite')) {                  
                  $data['affichage_droite'] = session('affichage_droite');
            }
                        
            // Messages avec cet utilisateur
            $data['messages_with_user'] = [];
            $id_other_user_chat = 0;
            if (session('id_other_user_chat')) {                  
                  $id_other_user_chat = $data['id_other_user_chat'] = session('id_other_user_chat');
                  $data['messages_with_user'] = $this->message_user->getMessagesByUser($id_other_user_chat);             
                  $data['other_user'] = $this->user->getById($id_other_user_chat);
                  
                  //$data['last_connection'] = 
                  
            }     
            
            // Formatage de l'affichage de la date et heure
            foreach ($data['messages_with_user'] as $message) {
                  
                  $message->date_heure = '';                                    
                  
                  $date_envoi = date('Y-m-d', strtotime($message->created_at));                 
                  
                  $date_aujourdhui = date('Y-m-d');
                  $date_hier = date('Y-m-d', strtotime(' - 1 day'));                      
                  
                  $heure_envoi = date('H', strtotime($message->created_at)) . ':' . date('i', strtotime($message->created_at));
                  
                  if ($date_envoi == $date_hier) {
                        $message->date_heure = 'Hier à ' .  $heure_envoi;
                  } elseif ($date_envoi == $date_aujourdhui) {
                        $message->date_heure = 'Aujourd\'hui à ' .  $heure_envoi;
                  } else {
                        $message->date_heure = date('d.m.y à ', strtotime($message->created_at))  . $heure_envoi;
                  }
                  
                  $message->date_heure = '<strong>' . $message->date_heure . '</strong>';
            }
            
            // Rooms
            $data['rooms'] = $this->room->getAll();
                        
            $data['room_edit'] = null;            
            if (session('room_edit_session_id')) {
                  $id_room = session('room_edit_session_id');
                  $room = $this->room->getById($id_room);
                  if ($room) {
                        $data['room_edit'] = $room;
                  }
            }
            
            // Membres
            $data['statut_other_user'] = '';
            
            $data['users'] = $this->user->getAll(true, $connectd_user->id);
            
            foreach ($data['users'] as $item) {
                  
                  // last request
                  $last_request = $this->requete->getLastOne($item->id);
                  
                  // statut                                 
                   if ($item->profil->statut == Constantes::PROFIL_STATUT_HORS_LIGNE) {
                        $item->statut = 'Hors ligne';
                        if ($item->id == $id_other_user_chat) {                              
                              $data['statut_other_user'] = 'Hors ligne';
                        }
                   } elseif ($item->profil->statut == Constantes::PROFIL_STATUT_EN_LIGNE)  {
                        $item->statut = 'En ligne';
                        if ($item->id == $id_other_user_chat) {                              
                              $data['statut_other_user'] = 'En ligne';
                        }
                   }
                  
                  // image profil
                  $item->imageProfil = asset('public/storage/images/profils/1/room.png');
                  if ($item['profil']['image_id'] != null) {
                        $item->imageProfil = $item['profil']['image_id'];
                  }     
                  
                  // select user with chat
                  $item->selectionne = false;
                  if ($item->id == $id_other_user_chat) {
                        $item->selectionne = true;
                  }
                  
            }
            
            $data['membre_edit'] = null;            
            if (session('membre_edit_session_id')) {
                  $id_room = session('membre_edit_session_id');
                  $membre_edit = $this->room->getById($id_room);
                  if ($membre_edit) {
                        $data['membre_edit'] = $membre_edit;
                  }
            }
            
            // Utilisateur habilité à CRUD room ?
            $data['habilite_room'] = false;            
            if ($profil_connected_user && ($profil_connected_user->type == Constantes::PROFIL_MANAGER || $profil_connected_user->type == Constantes::PROFIL_ADMIN) ) {
                  $data['habilite_room'] = true;
            }
            
            // Publics
            $data['nb_rooms_publics'] = $data['nb_rooms_prives'] = 0;
            
            foreach ($data['rooms'] as $item2) {
                  
                  if ($item2->prive == 0) {
                        $data['nb_rooms_publics']++;                        
                  } else {
                        $data['nb_rooms_prives']++;
                  }
                  
                  $item2->habilite_edit_room = false;                  
                  if ($item2->user_id == $connectd_user->id && $profil_connected_user[0]->type == Constantes::PROFIL_MANAGER  || $profil_connected_user[0]->type == Constantes::PROFIL_ADMIN) {
                        $item2->habilite_edit_room = true;
                  }
            }
            
            return view('home', $data);
    }
    
    public function switchListeGauche(Request $request)
    {
          if ($request->has('affichage_gauche')) {
                session(['affichage_gauche' => $request->get('affichage_gauche') ]);
          }
          
          return redirect()->route('home');
    }
    
    public function switchListeDroite(Request $request)
    {
          if ($request->has('affichage_droite')) {
                session(['affichage_droite' => $request->get('affichage_droite') ]);
          }
          
          if($request->has('id_other_user_chat')) {
                session(['id_other_user_chat' => $request->get('id_other_user_chat') ]);
          }
          
          return redirect()->route('home');
    }
    
    public function showEditRoomForm(Request $request)
    {
          ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
}
