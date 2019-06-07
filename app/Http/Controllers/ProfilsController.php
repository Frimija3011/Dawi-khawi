<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilsController extends Controller
{
      private $profil;
      
      public function getAll(Request $request)
      {
            
      }
      
      public function get(Request $request)
      {
            
      }
      
      public function save($user_id)
      {           
            $profil = new Profil();            
            $profil->image_id = null;
            
            $profil->date_naissance = null;
            
            $profil->date_inscription = date('Y-m-d H:i:s');
            $profil->date_prem_connexion = date('Y-m-d H:i:s');
            $profil->date_dern_connexion = date('Y-m-d H:i:s');
            $profil->date_dern_dcnx = null;
            
            $profil->civilite = 'NC';
            $profil->nom = '';
            $profil->prenom = '';            
            
            $profil->user_id = $user_id;
            
            $profil->type = 'UTILISATEUR';
            $profil->statut = 'EN_LIGNE';
            
            $save = $profil->save();
            
            if (!$save) {
                  return 0;
            }
            
            return $profil->id;
      }
      
      public function update(Request $request)
      {            
            $id = 0;
            if ($request->has('id')) {
                  $id = $request->get('id');
            } else {
                  return $id;
                  exit();
            }
            
            if (!is_int($id)) {
                  return 0;
            }
            
            $profil = Profil::find($id);          
            
            if (!$profil) {
                  return 0;
            }
            
            // ******************** Image ********************
            $image_id = null;
            if ($request->has('image_id')) {
                  $image_id = $request->get('image_id');
            }
            
            $profil->image_id = $image_id;
            
            // ******************** date de naissance ********************
            $date_naissance = null;
            if ($request->has('date_naissance')) {
                  $date_naissance = $request->get('date_naissance');
            } else {
                  return 0;
            }
            
            $profil->date_naissance = $date_naissance;
            
            // ******************** civilite ********************
            $civilite = null;
            if ($request->has('civilite')) {
                  $civilite = $request->get('civilite');
            } else {
                  return 0;
            }
            
            $profil->civilite = $civilite;
            
            // ******************** nom ********************
            $nom = null;
            if ($request->has('nom')) {
                  $nom = $request->get('civilite');
            } 
            
            $profil->nom = $nom;
            
            // ******************** prénom ********************
            $prenom = null;
            if ($request->has('prenom')) {
                  $prenom = $request->get('prenom');
            } 
            
            $profil->prenom = $prenom;
            
            // ******************** type ********************
            $type = 'UTILISATEUR';
            if ($request->has('type')) {
                  $type = $request->get('type');
            } 
            
            $profil->type = $type;     
            
            // ******************** statut ********************
            $statut = 'EN_LIGNE';
            if ($request->has('statut')) {
                  $statut = $request->get('statut');
            } 
            
            $profil->statut = $statut;        
            
            // ******************** Updating ********************            
            $update = $profil->update();
            
            if ($update) {
                  return $profil->id;
            }
            
            return 0;            
      }
}
